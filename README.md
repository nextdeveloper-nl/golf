# NextDeveloper Golf

A Laravel library for managing golf club operations, course bookings, and tee time reservations. It provides a complete backend for golf facility management — clubs, courses, tee times, and reservations — with IAM-scoped access control and a full REST API.

## Features

- [x] Golf club management — register and manage golf club entities
- [x] Course management — multiple courses per club with hole and par information
- [x] Tee time management — define available tee time slots per course
- [x] Reservation management — book tee times with player and group tracking
- [x] Role-based access control scoped to account ownership
- [ ] Online payment integration for reservations
- [ ] Handicap tracking
- [ ] Scorecard management
- [ ] Tournament and event management

## Core Models

| Model | Description |
|---|---|
| `Clubs` | Golf club entity with location and contact details |
| `Courses` | Golf course belonging to a club |
| `TeeTimes` | Available tee time slots on a course |
| `Reservations` | Player reservations for a tee time |

## Installation

```bash
composer require nextdeveloper/golf
```

Register the service provider in `config/app.php` if not using auto-discovery:

```php
NextDeveloper\Golf\GolfServiceProvider::class,
```

## Commercial Support

Please let us know if you need any commercial support. We will be happy to help you on your project and/or applying this library in your project.

support@plusclouds.com

---

## Our Libraries

This library is part of the **NextDeveloper / PlusClouds open-source ecosystem**. Browse all available libraries and find the right building blocks for your next project:

[https://plusclouds.com/us/solutions/libraries](https://plusclouds.com/us/solutions/libraries)

---

## Join the Community

We believe great software is built together. The PlusClouds developer community is a place where engineers share ideas, ask questions, showcase what they have built, and help shape the direction of these libraries. Whether you are integrating a single package or building an entire platform on top of our stack, you are very welcome here.

Come and join us — we would love to see what you build:

[https://plusclouds.com/us/community](https://plusclouds.com/us/community)
