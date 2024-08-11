CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    price DECIMAL(5,2) NOT NULL,
    image_url VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data into the 'books' table
INSERT INTO books (title, author, genre, price, image_url, description) VALUES
('The Hunger Games', 'Suzanne Collins', 'Fiction', 7.00, 'hu.jpeg', 'Dystopian novel about survival in a post-apocalyptic world.'),
('Fire and Blood', 'George R. R. Martin', 'Fantasy', 7.00, 'f.jpeg', 'The history of the Targaryens in Westeros.'),
('The Power', 'Naomi Alderman', 'Science Fiction', 13.00, 'p.png', 'A world where women develop the power to emit electric shocks.'),
('The Stranger', 'Albert Camus', 'Philosophical Fiction', 8.00, 'download (3).png', 'A novel that deals with absurdism.'),
('The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', 9.00, 'download (3).jpeg', 'An epic high-fantasy novel.'),
('Crime and Punishment', 'Fyodor Dostoevsky', 'Classics', 11.00, 'images (1).jpeg', 'A novel about the mental anguish and moral dilemmas of an impoverished ex-student.');

-- Retrieve all data from the 'books' table to verify insertion
SELECT * FROM books;