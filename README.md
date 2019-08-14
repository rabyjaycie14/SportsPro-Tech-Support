# SportsPro-Tech-Support
Web Technology | University of Michigan-Dearborn | Dearborn, MI | 2018
----

The following verbiage is in direct reference from the following textbook:

  - Murach’s PHP and MySQL (3rd Edition) by Joel Murach and Ray Harris
  - Published October 2017
  - ISBN 978-1-943872-38-1

## DISCLAIMER:
-----
 - This course project required a team of 2; therefore, the following parts of this project were completed by myself, and
 the rest by my partner.
  1. Project 6-2 - Manage Technicians
  2. Project 6-4 - Register Product
  3. Project 6-5 - Create Incident
  
 - Also, a skeleton of this project was presented *to* us by the Professor, and portions of the project were written by
 neither myself, nor my partner. (I.e. tech_support.sql, for instance)

# Introduction
-----
- The projects in this document let you apply the programming skills you learn in
Murach’s PHP and MySQL by developing an application called SportsPro Technical
Support. This application is designed for the technical support department of a
hypothetical software company that develops software for sports leagues, and it uses a
database named tech_support.
- The purpose of the application is to track technical support service calls (referred to
as incidents) in a database that also stores information about the company’s customers,
software products, and technicians.

## Project 6-1: Manage products
-----
### Product List Page
  #### Operation
  - When the user clicks the Delete button for a product, the product is deleted from the
  database.
  - When the user clicks the Add Product link, the Add Product page is displayed.
  - When the user clicks the Home link, the main menu is displayed.
  
### Add Product Page
  #### Operation
  - When the user enters the data for a new product into the text boxes and clicks the Add
  Product button, the product is added to the database and the Product List page is
  displayed again, so the user can view the newly added product.
  - When the user clicks the View Product List link, the Product List page is displayed.

  #### Specification
  - Validate the data the user enters on the Add Product page to be sure that the user enters
  a product code, name, version, and release date. If this data isn’t provided, display an
  Error page that indicates that a required field was not entered.

## Project 6-2: Manage technicians
-----
### Technician List Page
  #### Operation
  - When the user clicks the Delete button for a technician, the technician is deleted from
  the database.
  - When the user clicks the Add Technician link, the Add Technician page is displayed.

### Add Technician Page
  #### Operation
  - When the user enters the data for a new technician into the text boxes and clicks the
  Add Technician button, the technician is added to the database.
  
  #### Specifications
  - Validate the data the user enters on the Add Technician page to be sure that the user
  enters data in every text box. If this data isn’t provided, display an Error page that
  indicates that a required field was not entered.

## Project 6-3: Manage customers
-----
### Select Customer Page
  #### Operation
  - When the user enters a last name and clicks the Search button, the application displays
  a table of customers with the specified last name.
  - When the user clicks the Select button for a customer, the data for that customer is
  displayed on the View/Update Customer page.
 
 ### View/Update Customer Page
   #### Operation
  - When the user clicks the Update Customer button for a customer, the application
  updates the database. The user can also click the Back button or the Search Customers
  link to return to the Search Customers page without modifying the database.

  #### Specifications
  - US is the country code for the United States.

## Project 6-4: Register product
-----
### Customer Login Page
  #### Operation
  - To log in, the customer can enter his or her email address and click on the Login
  button.
    
### Register Product Page (View 1)
  #### Operation
  - To register a product, the customer can select the product and click on the Register
  Product button.

  #### Specifications
  - The Product drop-down list should include all products.

### Register Products (View 2)
  #### Operation
  - After the customer clicks on the Register Product button, the application displays a
  message that indicates that the product was registered successfully. This message
  should include the product’s code.

## Project 6-5: Create incident
-----
  #### Operation
  - To get a customer, the user can enter the customer’s email address. Then, the user can
  click on the Get Customer button to retrieve the customer’s data and display the Create
  Incident page.
