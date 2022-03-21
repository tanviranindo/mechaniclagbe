# Overview

Mechanic Lagbe is an online car service appointment system. There are two types of accounts. One is client, where car enthusiasts can book and delete appointments. And, another one is mechanic, where they can see, update and delete appointments.

#Content

- [Link](#Link)
- [Stack](#Stack)
- [Handle](#Handle)
- [Usage](#Usage)
- [Todo](#Todo)
- [Bug](#Bug)
- [Note](#Note)
- [Demo](#Demo)

## Link

- [Heroku Deploy](https://mechaniclagbe.herokuapp.com) (Latest)
- [GitHub Repository](https://github.com/tanviranindo/mechaniclagbe)

## Stack

### Development

- **Backend** - PHP, JS, JQuery
- **Frontend** - HTML, CSS
- **Database** - MySQL
- **Others** - Bootstrap, Fontawesome, Datatables

### Deployment

- **Database** - ClearDB
- **Host** - GitHub and Heroku

## Handle

Two demo login handles are given below -

```shell
Mechanic
Email - mechanic@gmail.com
Password - 123

Client
Email - client@gmail.com
Password - 123
```

## Usage

Database (`dbconfig.php`) is configured for Heroku. To run the application in local machine, use local configuration (`dbconfiglocal.php`) by replacing or renaming (`dbconfig.php`). Also, for all requirements to run application in local machine, docker file has been provided. Moreover, import `machinelagbe.sql` into MySQL.

## Todo

- [x] Clients and mechanics can log in and register
- [x] Clients can create and delete appointments
- [x] Mechanics can update and delete appointments
- [x] Appointment status updates based on time
- [x] Email, phone, password validation are added
- [x] Used Datatables for table list, pagination and search
- [ ] Clients can provide ratings on appointments
- [ ] Mechanics performance will be tracked based on appointment count and ratings

## Bug

- [ ] Appointment status may not be functional because of different timezones of server and local machine

## Note

1. Each mechanic can have 4 appointments each day.
2. Without any mechanic account client can not create appointment.
3. Appointments can only be created on upcoming dates which will be marked as "Appointed".
4. During the appointment time it will be marked as "In Service".
5. After the appointment time if mechanic does not change the status to "Delivered", it will be automatically marked as "Due".

## Demo

![Demo](images/demo.gif?raw=true "DEMO")
