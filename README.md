# Credit Tracker

A simple local web application built with **Laravel** to help track customer credits and payments for a small store.

## About

This app was built for my grandmother's store to keep track of people's debts and payments. Instead of writing credits on paper, this app allows easy recording, editing, and deleting of customer transactions.

## Tech Stack

- **Laravel** — PHP framework for backend logic and routing
- **Eloquent ORM** — database interaction and model relationships
- **Blade Templates** — server-side templating for views
- **Tailwind CSS** — utility-first CSS framework for styling
- **MySQL** — database via XAMPP
- **XAMPP** — local Apache and MySQL server

## Features

- Add customers with their initial transaction (debt or payment)
- View all customer transactions in a dashboard
- Edit and delete individual transactions
- Edit and delete individual customers
- Bulk delete customers using checkboxes
- Manually set transaction date when editing

## How to Run

This app runs **locally** using XAMPP. A `.bat` script is included to automate startup.

### Requirements

- [XAMPP](https://www.apachefriends.org/) installed
- PHP >= 8.0
- Composer
