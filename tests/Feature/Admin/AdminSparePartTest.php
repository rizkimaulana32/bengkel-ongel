<?php

namespace Tests\Feature;

use App\Models\SparePart;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminSparePartTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Membuat user admin yang akan digunakan di seluruh test
        $this->admin = User::factory()->create([
            'password' => bcrypt('password'),
            'usertype' => 'admin',
        ]);
    }

    public function test_admin_can_create_spare_part()
    {
        Storage::fake('public'); // fake disk storage

        $this->actingAs($this->admin);

        $sparePartId = 1001;
        $response = $this->post(route('admin.spare_parts.store'), [
            'spare_part_id' => $sparePartId,
            'name' => 'Brake Pad',
            'stock' => 10,
            'entry_date' => now()->toDateString(),
            'description' => 'High quality brake pad',
            'price' => 150000,
            'picture' => UploadedFile::fake()->image('brake.jpg'),
        ]);

        $response->assertRedirect(route('admin.spare_parts.index'));
        $this->assertDatabaseHas('spare_parts', [
            'spare_part_id' => $sparePartId,
            'name' => 'Brake Pad',
        ]);
    }

    public function update(Request $request, $id)
    {
        $sparePart = SparePart::findOrFail($id);

        $request->validate([
            'spare_part_id' => 'required|integer|unique:spare_parts,spare_part_id,' . $sparePart->id,
            'name' => 'required|string|max:50',
            'stock' => 'required|integer',
            'entry_date' => 'required|date',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            // Delete old image if exists
            if ($sparePart->picture) {
                Storage::disk('public')->delete('spare_parts/' . $sparePart->picture);
            }
            
            // Store new image with hash name
            $path = $request->file('picture')->store('spare_parts', 'public');
            $sparePart->picture = basename($path);
        }

        $sparePart->spare_part_id = $request->spare_part_id;
        $sparePart->name = $request->name;
        $sparePart->description = $request->description;
        $sparePart->price = $request->price;
        $sparePart->stock = $request->stock;
        $sparePart->entry_date = $request->entry_date;
        $sparePart->save();

        return redirect()->route('admin.spare_parts.index')
            ->with('success', 'Spare Part updated successfully.');
    }

    public function test_admin_can_delete_spare_part()
    {
        // Buat spare part secara manual karena tidak ada factory
        $sparePart = new SparePart([
            'spare_part_id' => 1003,
            'name' => 'Test Part to Delete',
            'stock' => 5,
            'entry_date' => now()->toDateString(),
            'description' => 'To be deleted',
            'price' => 100000,
            'picture' => 'test_image.jpg',
        ]);
        $sparePart->save();

        $this->actingAs($this->admin);

        // Gunakan post dengan _method=DELETE jika delete juga mengalami masalah yang sama
        $response = $this->delete(route('admin.spare_parts.destroy', $sparePart->spare_part_id));

        $response->assertRedirect(route('admin.spare_parts.index'));
        $this->assertDatabaseMissing('spare_parts', ['spare_part_id' => $sparePart->spare_part_id]);
    }

    public function test_admin_can_view_spare_parts_list()
    {
        // Buat beberapa spare part secara manual
        for ($i = 1; $i <= 3; $i++) {
            $sparePart = new SparePart([
                'spare_part_id' => 1000 + $i,
                'name' => "Test Part $i",
                'stock' => 5,
                'entry_date' => now()->toDateString(),
                'description' => "Description $i",
                'price' => 100000 * $i,
                'picture' => "test$i.jpg",
            ]);
            $sparePart->save();
        }

        $this->actingAs($this->admin);
        $response = $this->get(route('admin.spare_parts.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.spare_parts.index');
        $response->assertViewHas('spareParts');
    }

    public function test_non_admin_cannot_access_spare_parts_management()
    {
        // Membuat user non-admin
        $regularUser = User::factory()->create([
            'usertype' => 'customer',
        ]);

        $this->actingAs($regularUser);
        
        // Coba akses halaman index
        $response = $this->get(route('admin.spare_parts.index'));
        
        // Aplikasi menggunakan redirect ke login alih-alih 403
        $response->assertStatus(302); 
        
        // Coba membuat spare part baru
        $response = $this->post(route('admin.spare_parts.store'), [
            'spare_part_id' => 1003,
            'name' => 'Test Part',
            'stock' => 10,
        ]);
        $response->assertStatus(302);
    }
}