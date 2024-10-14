-- database: ../test.sqlite
-- Note: Do not delete the line above! It is helpful for testing your init.sql file.
--
-- Post Table
CREATE TABLE posts (
    id INTEGER NOT NULL UNIQUE,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    img_source TEXT,
    PRIMARY KEY(id AUTOINCREMENT)
);

-- Source: ChatGPT Generated
INSERT INTO
    posts (id, title, description)
VALUES
    (
        1,
        "Chic Casual Tops",
        "Explore our collection of chic casual tops perfect for any day out."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        2,
        "Elegant Evening Bottoms",
        "Discover bottoms that elevate your evening wear."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        3,
        "Sneakers for Every Occasion",
        "Versatile sneakers that blend style with comfort."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        4,
        "Accessorize with Confidence",
        "The perfect accessories to complement any outfit."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        5,
        "Trendy Hairstyles",
        "Hairstyles that are easy to manage and look great."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        6,
        "Statement Jewelry Pieces",
        "Jewelry that makes every outfit pop."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        7,
        "The Formal Collection",
        "Formal wear that's bound to turn heads."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        8,
        "Business Attire Essentials",
        "Staple pieces for a polished business look."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        9,
        "Athletic Wear for Active Lifestyles",
        "Functional and fashionable athletic wear."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        10,
        "Seasonal Trends in Footwear",
        "Shoes that define the season's trends."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        11,
        "Cozy Knitwear Collection",
        "Stay warm and stylish with our cozy knitwear."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        12,
        "Denim Jean Essentials",
        "Timeless denim jeans that never go out of style."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        13,
        "Knotless Goddess Braids",
        "The perfect braided hairstyle for a special occasion."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        14,
        "Accessorizing with Scarves",
        "Transform your look with our versatile scarf collection."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        15,
        "Stylish Jackets for Cold Days",
        "Bundle up in our fashionable outerwear options."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        16,
        "Essential Summer Earrings",
        "Stay cool and trendy with our must-have summer Earrings."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        17,
        "Formal Blazer",
        "Elevate your formal attire with this blazer"
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        18,
        "Effortless Boho-Chic Bottoms",
        "Channel your inner free spirit with our boho-chic outfits."
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        19,
        "Half-Up Half-Down",
        "Thus is the perfect prom hairstyle"
    );

INSERT INTO
    posts (id, title, description)
VALUES
    (
        20,
        "Beach Curls",
        "Explore the latest hair trend to rock this summer."
    );

-- Tag Table
CREATE TABLE tags (
    id INTEGER NOT NULL UNIQUE,
    tag_name TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
);

INSERT INTO
    tags (id, tag_name)
VALUES
    (1, "Tops");

INSERT INTO
    tags (id, tag_name)
VALUES
    (2, "Bottoms");

INSERT INTO
    tags (id, tag_name)
VALUES
    (3, "Shoes");

INSERT INTO
    tags (id, tag_name)
VALUES
    (4, "Accessories");

INSERT INTO
    tags (id, tag_name)
VALUES
    (5, "Hair");

INSERT INTO
    tags (id, tag_name)
VALUES
    (6, "Jewelry");

INSERT INTO
    tags (id, tag_name)
VALUES
    (7, "Formal");

INSERT INTO
    tags (id, tag_name)
VALUES
    (8, "Casual");

INSERT INTO
    tags (id, tag_name)
VALUES
    (9, "Business");

INSERT INTO
    tags (id, tag_name)
VALUES
    (10, "Athletic");

-- Post_Tag Table
CREATE TABLE post_tags (
    id INTEGER NOT NULL UNIQUE,
    post_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT),
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (1, 1, 1);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (2, 1, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (3, 2, 2);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (4, 2, 7);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (5, 3, 3);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (6, 3, 10);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (7, 4, 4);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (8, 4, 6);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (9, 5, 5);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (10, 5, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (11, 6, 6);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (12, 6, 7);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (13, 7, 7);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (14, 7, 2);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (15, 8, 9);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (16, 8, 1);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (17, 9, 10);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (18, 9, 3);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (19, 10, 3);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (20, 10, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (21, 11, 1);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (22, 11, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (23, 12, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (24, 12, 2);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (25, 13, 5);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (26, 13, 7);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (27, 14, 4);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (28, 14, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (29, 15, 4);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (30, 15, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (31, 16, 6);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (32, 16, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (33, 17, 1);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (34, 17, 7);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (35, 18, 2);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (36, 18, 8);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (37, 19, 5);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (38, 19, 7);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (39, 20, 5);

INSERT INTO
    post_tags (id, post_id, tag_id)
VALUES
    (40, 20, 8);

CREATE TABLE users (
    id INTEGER NOT NULL UNIQUE,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
);

-- password: monkey
INSERT INTO
    users (id, name, email, username, password)
VALUES
    (
        1,
        'Stephanie Dyer',
        'sd625@cornell.edu',
        'sd625',
        '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.'
    );
    
INSERT INTO
    users (id, name, email, username, password)
VALUES
    (
        2,
        'Andre Thomas',
        'ajt243@cornell.edu',
        'ajt243',
        '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.'
    );

CREATE TABLE sessions (
    id INTEGER NOT NULL UNIQUE,
    user_id INTEGER NOT NULL,
    session TEXT NOT NULL UNIQUE,
    last_login TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT) FOREIGN KEY(user_id) REFERENCES users(id)
);
