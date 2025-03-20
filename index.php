<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruition Motors API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1,
        h2 {
            color: #333;
        }

        .endpoint {
            background: #fff;
            padding: 15px;
            margin: 10px 0;
            border-left: 5px solid #007bff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .delete {
            border-left: 5px solid rgb(223, 25, 51) !important;
        }

        code {
            background: #eee;
            padding: 2px 5px;
            border-radius: 4px;
        }

        pre {
            background: #ddd;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <h1>Fruition Motors API Documentation</h1>
    <p>This API allows you to fetch car listings from Fruition Motors.</p>

    <div class="endpoint">
        <h2>Get All Cars</h2>
        <p><strong>Endpoint:</strong> <code>GET /api/cars</code></p>
        <p><strong>Description:</strong> Retrieves a list of all available cars.</p>
        <p><strong>Example Request:</strong></p>
        <pre>GET https://seok-young.online/api/cars</pre>
        <p><strong>Example Response:</strong></p>
        <pre>
{
    "status": 200,
    "cars": [
        {
            "id": 1,
            "title": "Toyota Camry 2022",
            "price": 25000,
            "year": 2022,
            "category": "sedan",
           " car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"]
        },
        ...
    ]
}
        </pre>
    </div>



    <div class="endpoint">
        <h2>Get All Cars Listing</h2>
        <p><strong>Endpoint:</strong> <code>GET /api/carlisting</code></p>
        <p><strong>Description:</strong> Retrieves a list of all available cars listibg.</p>
        <p><strong>Example Request:</strong></p>
        <pre>GET https://seok-young.online/api/carlisting</pre>
        <p><strong>Example Response:</strong></p>
        <pre>
{
    "status": 200,
    "cars": [
        {
            "id": 1,
            "title": "Toyota Camry 2022",
            "price": 25000,
            "year": 2022,
            "category": "sedan",
            "car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"]
        },
        ...
    ]
}
        </pre>
    </div>

    <div class="endpoint">
        <h2>Get Single Car</h2>
        <p><strong>Endpoint:</strong> <code>GET /api/car?id=1</code></p>
        <p><strong>Description:</strong> Fetch details of a single car by ID.</p>
        <p><strong>Example Request:</strong></p>
        <pre>GET https://seok-young.online/api/car?id=1</pre>
        <p><strong>Example Response:</strong></p>
        <pre>
{
    "status": 200,
    "car": {
        "id": 1,
        "title": "Toyota Camry 2022",
        "price": 25000,
        "year": 2022,
        "category": "sedan",
        "car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"]
    }
}
        </pre>
    </div>

    <div class="endpoint">
        <h2>Get Cars by Category</h2>
        <p><strong>Endpoint:</strong> <code>GET /api/cars?cat=sedan</code></p>
        <p><strong>Description:</strong> Fetches all cars within a specific category (e.g., sedan, SUV, truck).</p>
        <p><strong>Example Request:</strong></p>
        <pre>GET https://seok-young.online/api/cars?cat=sedan</pre>
        <p><strong>Example Response:</strong></p>
        <pre>
{
    "status": 200,
    "cars": [
        {
            "id": 2,
            "title": "Honda Accord 2021",
            "price": 22000,
            "year": 2021,
            "category": "sedan",
            "car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"]
        },
        ...
    ]
}
        </pre>
    </div>


    <div class="endpoint">
        <h2>Get all Category</h2>
        <p><strong>Endpoint:</strong> <code>GET /api/getCategory</code></p>
        <p><strong>Description:</strong> Fetches all category (e.g., sedan, SUV, truck).</p>
        <p><strong>Example Request:</strong></p>
        <pre>GET https://seok-young.online/api/getCategory</pre>
        <p><strong>Example Response:</strong></p>
        <pre>
        {
  "status": 200,
  "category": [
    {
      "name": "sedan"
      image:"https://unsplash/image1.jpg"
    },
    {
      "name": "suv"
      image:"https://unsplash/image1.jpg"
    },
    {
      "name": "truck"
      image:"https://unsplash/image1.jpg"
    },
    {
      "name": "convertible"
      image:"https://unsplash/image1.jpg"
    },
    {
      "name": "lorry"
      image:"https://unsplash/image1.jpg"
    }
  ]
}
        </pre>
    </div>


    <div class="endpoint">
        <h2>Create Cars</h2>
        <p><strong>Endpoint:</strong> <code>POST /api/createCar</code></p>
        <p><strong>Description:</strong> Creates a car and its details in the database</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/createCar</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
    "title":"mercedes",
    "description":"Built to the top.......",
    "price":2000
    "image_url":"https:imagelink.jpp",
   " car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"],
    "category":"suv",
    "brand_name":"mercedes benz",
    "model":"c300",
    "year":"2017",
    "fuel_type":"diesel",
    "color":"black",
    "seat":4,
    "type_of_gear":"hybrid",

    
}
        </pre>
    </div>



    <div class="endpoint">
        <h2>Create CarsListing</h2>
        <p><strong>Endpoint:</strong> <code>POST /api/createListing</code></p>
        <p><strong>Description:</strong> Creates a car for listing</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/createListing</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
    "title":"AUDI",
    "description":"Built to the TOP CLASS .",
    "price":"234",
    "image_url":"https://images.unsplash.com/photo-1462396881884-de2c07cb95ed?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fENBUlN8ZW58MHx8MHx8fDA%3D",
   "car_gallery":["https://images.unsplash.com/photo-1603386329225-868f9b1ee6c9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzZ8fENBUlN8ZW58MHx8MHx8fDA%3D", "https://images.unsplash.com/photo-1541348263662-e068662d82af?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzJ8fENBUlN8ZW58MHx8MHx8fDA%3D"],
    "category":"sports",
    "brand_name":"audi",
    "model":"g3",
    "year":"2017",
    "fuel_type":"fuel",
    "color":"black"
 
   

    
}
   

        </pre>
    </div>




    <div class="endpoint">
        <h2>Create Admin</h2>
        <p><strong>Endpoint:</strong> <code>POST /api/createAdmin</code></p>
        <p><strong>Description:</strong> Crates an administartor</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/createAdmin</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
    "email":"Admin@gmail.com",
    password:"**********"

    
}
        </pre>
    </div>

    <div class="endpoint">
        <h2>Create Category</h2>
        <p><strong>Endpoint:</strong> <code>POST /api/createCategory</code></p>
        <p><strong>Description:</strong> Creates a car category</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/createCategory</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
    "categoryName":"truck",
    thumbnail:"https:image/image1.jpg"
   

    
}
        </pre>
    </div>


    <div class="endpoint">
        <h2>Update Car</h2>
        <p><strong>Endpoint:</strong> <code>PUT /api/UpdateCar</code></p>
        <p><strong>Description:</strong> Updates a car and its details in the database</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/updateCar?id=2</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
    "title":"mercedes",
    "description":"Built to the top.......",
    "price":2000
    "image_url":"https:imagelink.jpp",
    "car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"]
    "category":"suv",
    "brand_name":"mercedes benz",
    "model":"c300",
    "year":"2017",
    "fuel_type":"diesel",
    "color":"black",
    "seat":4,
    "type_of_gear":"hybrid",

    
}
        </pre>
    </div>


    <div class="endpoint">
        <h2>Update Car Listing</h2>
        <p><strong>Endpoint:</strong> <code>PUT /api/updateListing</code></p>
        <p><strong>Description:</strong> Updates a car and its details in the database</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/updateCar?id=2</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
    "title":"mercedes",
    "description":"Built to the top.......",
    "price":2000
    "image_url":"https:imagelink.jpp",
    "car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"]
    "category":"suv",
    "brand_name":"mercedes benz",
    "model":"c300",
    "fuel_type":"diesel",
    "color":"black",
   

    
}
        </pre>
    </div>

    <div class="endpoint delete">
        <h2>Delete Car</h2>
        <p><strong>Endpoint:</strong> <code>DELETE /api/UpdateCar?id=2</code></p>
        <p><strong>Description:</strong> DELETS a car and its details in the database</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/deleteCar?id=2</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
  "status": "success",
  "message": "Car deleted successfully"
}
        </pre>
    </div>
</body>

</html>