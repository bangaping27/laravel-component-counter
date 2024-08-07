# Component Counter

A Laravel package to count the number of routes, controllers, views, models, migrations, and seeders in your Laravel application.

## Installation

You can install the package via Composer. Run the following command in your Laravel project directory:

```bash
composer require bangaping27/component-counter
```

## Usage
Once the package is installed, you can use the **'count:components'** command to get a summary of various components in your Laravel application.

## Running the Command
To count the number of routes, controllers, views, models, migrations, and seeders, use the following Artisan command:
```bash
php artisan count:components
```

## Output
The command will display a neatly formatted report with the following details:

- Total Controllers: The number of controller files in app/Http/Controllers.
- Total Views: The number of view files in resources/views.
- Total Models: The number of model files in app/Models.
- Total Migrations: The number of migration files in database/migrations.
- Total Seeders: The number of seeder files in database/seeders.
- Total Routes: The number of registered routes

The output will look like this:

![alt text](<WhatsApp Image 2024-08-07 at 10.27.35_0ccf8ac9.jpg>)

##  License
This package is licensed under the MIT License.

## Contributing
If you would like to contribute to this package, please follow the standard GitHub workflow:

1. Fork the repository.
2. Create a new branch (git checkout -b feature-branch).
3. Commit your changes (git commit -am 'Add new feature').
4. Push to the branch (git push origin feature-branch).
5. Create a new Pull Request.
6. 
### Contact
For any questions or suggestions, please contact mail@raflianggoro.com


### **Penjelasan:**

- **Installation**: Menjelaskan bagaimana menginstal package.
- **Usage**: Menjelaskan cara menggunakan perintah yang disediakan oleh package.
- **License**: Menyediakan informasi tentang lisensi package.
- **Contributing**: Memberikan petunjuk tentang bagaimana orang lain bisa berkontribusi pada package.
- **Contact**: Informasi kontak untuk pertanyaan atau saran.