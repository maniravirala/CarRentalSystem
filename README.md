# CarRent
Welcome to CarRent – a web application for car rental agencies and customers, designed to provide a seamless car rental experience.


**CarRent is a web-based application that allows car rental agencies to manage their vehicle listings and customers to book cars online. The platform ensures a user-friendly experience with secure authentication and easy navigation.**


### Features
1. **User Registration**: Separate registration pages for customers and car rental agencies.
2. **Login System:** Secure login for both customers and agencies with JWT authentication.
3. **Car Management:** Agencies can add and manage car listings, including vehicle model, number, seating capacity, and rent per day.
4. **Car Booking:** Customers can view available cars, select rental periods, and book cars online.
5. **Booking Management:** Agencies can view all bookings for their cars.

   
### Technologies Used
1. **HTML/CSS:** For creating a responsive and visually appealing user interface.
2. **JavaScript:** Enhances interactivity and improves user experience.
3. **PHP:** For building a robust and scalable backend.
4. **MySQL:** Manages and stores all user and vehicle data securely.

   
### Installation

#### Prerequisites
1. XAMPP or any similar PHP development environment.
2. Clone the Repository in htdocs folder of XAMPP:
```
git clone https://github.com/spm999/Car-Rental-System.git
```
3. Set Up the Database:
   1. Import the car_booking.sql file into your MySQL database.
   2. Configure the database connection in config/connection.php.

4. Start the Server:
  1. Open XAMPP and start the Apache and MySQL modules.
  2. Run the Application:

**Open your browser and go to http://localhost/CarRent/home/index.php.**


### Usage
1. Registration: Customers and agencies can register through their respective registration pages.
2. Login:Use the login page to access your account.
3. Car Management (Agency):Agencies can add, edit, and view cars through the dashboard.
4. Car Booking (Customer):Customers can browse available cars, select rental periods, and book cars.
5. View Bookings (Agency):Agencies can view all bookings for their cars.


### Database Schema
The database consists of the following tables:
1. agency
2. agencycar
3. cars
4. customers
5. rentedcar
   

***The car_booking.sql file contains the complete schema and sample data.***


### Contributing
Contributions are welcome! Please open an issue or submit a pull request for any changes.


### License
This project is licensed under the MIT License.

### Contact
For any inquiries or support, please contact:
***Name:*** Raju
***Email:*** mailraju1406@gmail.com


# CarRentalSystem
# CarRentalSystem
