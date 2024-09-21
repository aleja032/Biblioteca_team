CREATE TABLE Books (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title TEXT,
    author TEXT,
    isbn TEXT UNIQUE,
    published_year INTEGER,
    total_copies INTEGER NOT NULL DEFAULT 1,
    available_copies INTEGER NOT NULL DEFAULT 1
);

CREATE TABLE Members (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name TEXT,
    email TEXT UNIQUE,
    membership_date DATE DEFAULT CURRENT_DATE,
    password TEXT NOT NULL
);

CREATE TABLE Roles (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    role_name TEXT UNIQUE NOT NULL
);

CREATE TABLE UserRoles (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    member_id BIGINT,
    role_id BIGINT,
    FOREIGN KEY (member_id) REFERENCES Members(id),
    FOREIGN KEY (role_id) REFERENCES Roles(id)
);

CREATE TABLE Transactions (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    book_id BIGINT,
    member_id BIGINT,
    borrow_date DATE DEFAULT CURRENT_DATE,
    return_date DATE,
    FOREIGN KEY (book_id) REFERENCES Books(id),
    FOREIGN KEY (member_id) REFERENCES Members(id)
);

CREATE TABLE LendingHistory (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    book_id BIGINT,
    member_id BIGINT,
    lend_date DATE NOT NULL DEFAULT CURRENT_DATE,
    due_date DATE NOT NULL,
    return_date DATE,
    FOREIGN KEY (book_id) REFERENCES Books(id),
    FOREIGN KEY (member_id) REFERENCES Members(id)
);
