# Social Network Project

## Table of Contents
1. [Introduction](#introduction)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
---

## Introduction

This project is a social networking platform where users can:
- Create profiles with personal information and avatars.
- Add friends and manage friend requests.
- Post content, like posts, and comment on them.
- View their own profile and interact with other users' profiles.

The platform is built using Laravel, a PHP framework, and utilizes Tailwind CSS for styling.

---

## Features

### User Management
- **User Registration & Login**: Users can register and log in securely.
- **Profile Creation & Editing**: Users can edit their profile details (name, bio, avatar).
- **Password Hashing**: Secure password storage using Laravel's built-in hashing mechanisms.

### Friendship System
- **Friend Requests**: Send, accept, or cancel friend requests.
- **Friend List**: View a list of confirmed friends.
- **Pending Requests**: Manage pending friend requests.

### Post Management
- **Create Posts**: Users can create text-based posts.
- **Like & Comment**: Users can like posts and leave comments.
- **Post Interactions**: View counts of likes and comments for each post.

### Profile Page
- **User Information**: Display user details (name, email, bio, join date).
- **Posts, Likes, & Comments**: Show posts, likes, and comments made by the user.
- **Edit Profile**: Authenticated users can edit their own profiles.

### Responsive Design
- A clean and modern UI designed with **Tailwind CSS**.
- Fully responsive layout for both desktop and mobile devices.

---

## Technologies Used

- **Backend**: Laravel 11
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: PGSQL
- **Authentication**: Laravel's Built-in Authentication
- **Relationships**: Eloquent ORM for managing relationships between users, posts, likes, and comments.
- **Migrations**: Database migrations for schema management 
---