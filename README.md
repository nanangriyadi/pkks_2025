# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
# pkks_ci4
Menjalankan Proyek
Lakukan instalasi semua depedencies yang dibutuhkan dengan composer. Ketik perintah berikut pada root direktori project.

'composer install',

Buat database di Phpmyadmin dan ubah konfigurasi database dengan import file backup


edit env

	'hostname' => 'localhost',
	'username' => 'root', // <- sesuaikan dengan username mysql
	'password' => '', // <- isi dengan password user mysql
	'database' => 'pkks-2025', //<- sesuaikan nama database dengan yang kamu buat
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	
Dengan menggunakan migration 

	php spark make:migration create_About_table

 
	<?php
	
	namespace App\Database\Migrations;
	
	use CodeIgniter\Database\Migration;
	
	class CreateAboutTable extends Migration
	{
	    public function up()
	    {
		$this->forge->addField([
		    'id' => [
			'type'           => 'INT',
			'constraint'     => 11,
			'unsigned'       => true,
			'auto_increment' => true,
		    ],
		    'description' => [
			'type' => 'TEXT',
		    ],
		    'uploaded_at' => [
			'type'    => 'DATETIME',
			'default' => \CodeIgniter\Database\RawSql::currentTime(),
		    ],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('about');
	    }
	
	    public function down()
	    {
		$this->forge->dropTable('about');
	    }
	}
	

Dengan menggunakan migration 

	php spark make:migration create_Portfolio_table

	 <?php
	
	namespace App\Database\Migrations;
	
	use CodeIgniter\Database\Migration;
	
	class CreatePortfolioTable extends Migration
	{
	    public function up()
	    {
	        $this->forge->addField([
	            'id' => [
	                'type'           => 'INT',
	                'constraint'     => 11,
	                'unsigned'       => true,
	                'auto_increment' => true,
	            ],
	            'file_name' => [
	                'type'       => 'VARCHAR',
	                'constraint' => '255',
	            ],
	            'file_path' => [
	                'type'       => 'VARCHAR',
	                'constraint' => '255',
	            ],
	            'file_type' => [
	                'type'       => 'VARCHAR',
	                'constraint' => '100',
	            ],
	            'file_category' => [
	                'type'       => 'VARCHAR',
	                'constraint' => '50',
	                'default'    => 'pdf',
	            ],
	            'is_pdf' => [
	                'type'       => 'TINYINT',
	                'constraint' => 1,
	            ],
	            'is_video' => [
	                'type'       => 'TINYINT',
	                'constraint' => 1,
	            ],
	            'file_size' => [
	                'type'       => 'INT',
	                'constraint' => 11,
	            ],
	            'description' => [
	                'type'    => 'TEXT',
	                'null'    => true,
	            ],
	            'uploaded_at' => [
	                'type'    => 'TIMESTAMP',
	                'default' => \CodeIgniter\Database\RawSql::currentTime(),
	            ],
	        ]);
	        $this->forge->addKey('id', true);
	        $this->forge->createTable('portfolio');
	    }
	
	    public function down()
	    {
	        $this->forge->dropTable('portfolio');
	    }
	}
