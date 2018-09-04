<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180904212201 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE orders_foods (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, order_id INT NOT NULL, food_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resto_foods (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, food_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE ordersfoods');
        $this->addSql('DROP TABLE restofoods');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY bookings_ibfk_1');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY bookings_ibfk_2');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY bookings_ibfk_3');
        $this->addSql('DROP INDEX order_id ON bookings');
        $this->addSql('DROP INDEX restaurant_id ON bookings');
        $this->addSql('DROP INDEX user_id ON bookings');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY comments_ibfk_1');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY comments_ibfk_2');
        $this->addSql('DROP INDEX restaurant_id ON comments');
        $this->addSql('DROP INDEX user_id ON comments');
        $this->addSql('ALTER TABLE comments CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE favories DROP FOREIGN KEY favories_ibfk_1');
        $this->addSql('DROP INDEX restaurant_id ON favories');
        $this->addSql('DROP INDEX user_id ON favories');
        $this->addSql('ALTER TABLE foods DROP FOREIGN KEY foods_ibfk_1');
        $this->addSql('DROP INDEX speciality_id ON foods');
        $this->addSql('ALTER TABLE foods DROP speciality_id, CHANGE name name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY orders_ibfk_1');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY orders_ibfk_2');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY orders_ibfk_3');
        $this->addSql('DROP INDEX delivery_id ON orders');
        $this->addSql('DROP INDEX restaurant_id ON orders');
        $this->addSql('DROP INDEX user_id ON orders');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY pictures_ibfk_1');
        $this->addSql('DROP INDEX tva ON restaurants');
        $this->addSql('DROP INDEX picture_id ON restaurants');
        $this->addSql('ALTER TABLE restaurants DROP `long`, DROP lat, CHANGE zip_code zip_code INT NOT NULL');
        $this->addSql('ALTER TABLE specialities CHANGE contry country VARCHAR(45) NOT NULL');
        $this->addSql('DROP INDEX email ON users');
        $this->addSql('ALTER TABLE users DROP city, DROP category');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ordersfoods (id INT AUTO_INCREMENT NOT NULL, order_id INT NOT NULL, food_id INT NOT NULL, quantity INT NOT NULL, UNIQUE INDEX food_id (food_id), INDEX order_id (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restofoods (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, food_id INT NOT NULL, INDEX food_id (food_id), INDEX restaurant_id (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ordersfoods ADD CONSTRAINT ordersfoods_ibfk_1 FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE ordersfoods ADD CONSTRAINT ordersfoods_ibfk_2 FOREIGN KEY (food_id) REFERENCES foods (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE restofoods ADD CONSTRAINT restofoods_ibfk_1 FOREIGN KEY (restaurant_id) REFERENCES restaurants (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE restofoods ADD CONSTRAINT restofoods_ibfk_2 FOREIGN KEY (food_id) REFERENCES foods (id) ON UPDATE CASCADE');
        $this->addSql('DROP TABLE orders_foods');
        $this->addSql('DROP TABLE resto_foods');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT bookings_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT bookings_ibfk_2 FOREIGN KEY (restaurant_id) REFERENCES restaurants (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT bookings_ibfk_3 FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX order_id ON bookings (order_id)');
        $this->addSql('CREATE INDEX restaurant_id ON bookings (restaurant_id)');
        $this->addSql('CREATE INDEX user_id ON bookings (user_id)');
        $this->addSql('ALTER TABLE comments CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT comments_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT comments_ibfk_2 FOREIGN KEY (restaurant_id) REFERENCES restaurants (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX restaurant_id ON comments (restaurant_id)');
        $this->addSql('CREATE INDEX user_id ON comments (user_id)');
        $this->addSql('ALTER TABLE favories ADD CONSTRAINT favories_ibfk_1 FOREIGN KEY (restaurant_id) REFERENCES restaurants (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX restaurant_id ON favories (restaurant_id)');
        $this->addSql('CREATE INDEX user_id ON favories (user_id)');
        $this->addSql('ALTER TABLE foods ADD speciality_id INT DEFAULT NULL, CHANGE name name VARCHAR(60) NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE foods ADD CONSTRAINT foods_ibfk_1 FOREIGN KEY (speciality_id) REFERENCES specialities (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX speciality_id ON foods (speciality_id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT orders_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT orders_ibfk_2 FOREIGN KEY (restaurant_id) REFERENCES restaurants (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT orders_ibfk_3 FOREIGN KEY (delivery_id) REFERENCES deliveries (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX delivery_id ON orders (delivery_id)');
        $this->addSql('CREATE INDEX restaurant_id ON orders (restaurant_id)');
        $this->addSql('CREATE INDEX user_id ON orders (user_id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT pictures_ibfk_1 FOREIGN KEY (id) REFERENCES restaurants (picture_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE restaurants ADD `long` VARCHAR(255) NOT NULL COLLATE utf8mb4_bin, ADD lat VARCHAR(255) NOT NULL COLLATE utf8mb4_bin, CHANGE zip_code zip_code VARCHAR(11) NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('CREATE UNIQUE INDEX tva ON restaurants (tva)');
        $this->addSql('CREATE INDEX picture_id ON restaurants (picture_id)');
        $this->addSql('ALTER TABLE specialities CHANGE country contry VARCHAR(45) NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE users ADD city VARCHAR(45) NOT NULL COLLATE utf8mb4_bin, ADD category VARCHAR(11) NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('CREATE UNIQUE INDEX email ON users (email)');
    }
}
