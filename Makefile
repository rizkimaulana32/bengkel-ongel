.PHONY: build up up-d down

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

setup:
	@if [ ! -d "node_modules" ]; then \
		echo "node_modules tidak ditemukan. Menjalankan npm install..."; \
		npm install; \
	else \
		echo "node_modules sudah ada. Melewati npm install."; \
	fi
	@if [ ! -d "vendor" ]; then \
		echo "vendor tidak ditemukan. Menjalankan composer install..."; \
		composer install; \
	else \
		echo "vendor sudah ada. Melewati composer install."; \
	fi
	php artisan storage:link
	@echo "Memeriksa database..."
	@if ! mysql -u root -e 'use bengkel_ongel' -h 127.0.0.1 -P 3306; then \
		echo "Database 'bengkel_ongel' tidak ditemukan. Membuat database..."; \
		mysql -u root -e 'CREATE DATABASE bengkel_ongel' -h 127.0.0.1 -P 3306; \
	else \
		echo "Database 'bengkel_ongel' sudah ada. Melewati pembuatan database."; \
	fi
	@if [ -d "public/spare_parts" ]; then \
		echo "Menyalin file gambar ke public/storage..."; \
		cp -r public/spare_parts public/storage/spare_parts; \
	fi

run:
	php artisan serve

migrate:
	php artisan optimize
	php artisan cache:clear
	php artisan migrate:fresh --seed

build:
	npm run build