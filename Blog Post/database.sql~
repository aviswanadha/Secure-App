DROP TABLE IF EXISTS users;
CREATE TABLE users(username VARCHAR(50) PRIMARY KEY, password VARCHAR(100) NOT NULL);

DROP TABLE IF EXISTS posts;
CREATE TABLE posts(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, title varchar(255) NOT NULL, text text NOT NULL, published datetime NOT NULL, owner varchar(50), FOREIGN KEY(owner) REFERENCES users(username) ON DELETE CASCADE);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, title varchar(255) NOT NULL, content text NOT NULL, commenter varchar(255), time datetime NOT NULL, postid int NOT NULL, FOREIGN KEY(postid) REFERENCES posts(id) ON DELETE CASCADE);
