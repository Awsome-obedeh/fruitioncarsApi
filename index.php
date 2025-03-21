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
           " car_gallery":["https://example.com/image1.jpg", "https://example.com/image2.jpg"],
           "featured":"main"
        },
        ...
    ]
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
        <h2>Create contact</h2>
        <p><strong>Endpoint:</strong> <code>POST /api/contact</code></p>
        <p><strong>Description:</strong> Store User contact</p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/contact</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
        {
    "fullname":"fruition fruition",
    "phone":"123344",
    "message":"tell me something"
}
        </pre>
    </div>
    <div class="endpoint">
        <h2>Create sell order</h2>
        <p><strong>Endpoint:</strong> <code>POST /api/sell</code></p>
        <p><strong>Description:</strong> Allow a  User sell </p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/sell</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
        {
    "fullname":"obed chidera",
    "phone":"123344",
    "email":"fruition@gmail.com",
    "make":"toyota",
    "model":"camry",
    "year":2012,
    "transmission":"automatic",
    "color":"black",
    "condition":"good",
    "description":"You will live this car",
    "location":"port harcourt",
    "price":"1000000",
    "images":["https://images.unsplash.com/photo-1587750113469-d2ba02441e8f?q=80&w=1972&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"]

}
        </pre>
    </div>

    
    <div class="endpoint">
        <h2>get sell order</h2>
        <p><strong>Endpoint:</strong> <code>GET /api/sell</code></p>
        <p><strong>Description:</strong> Allow a  User sell </p>
        <p><strong>Example Request:</strong></p>
        <pre>GET https://seok-young.online/api/getSell</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
        {
    "fullname":"obed chidera",
    "phone":"123344",
    "email":"fruition@gmail.com",
    "make":"toyota",
    "model":"camry",
    "year":2012,
    .....

}
        </pre>
    </div>
    <div class="endpoint">
        <h2>Create Custom order</h2>
        <p><strong>Endpoint:</strong> <code>POST /api/customOrder</code></p>
        <p><strong>Description:</strong> Allow a  create an order </p>
        <p><strong>Example Request:</strong></p>
        <pre>POST https://seok-young.online/api/customOrder</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
        {
    "fullname":"obed chidera",
    "phone":"123344",
    "email":"fruition@gmail.com",
    "make":"toyota",
    "model":"camry",
    "year":2012,
    "transmission":"automatic",
    "color":"black",
    "condition":"good",
    "details":"You will live this car",

   

}
        </pre>
    </div>

    
    <div class="endpoint">
        <h2>get sell order</h2>
        <p><strong>Endpoint:</strong> <code>GET /api/getCustom</code></p>
        <p><strong>Description:</strong> get custom orders </p>
        <p><strong>Example Request:</strong></p>
        <pre>GET https://seok-young.online/api/getCustom</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
        {
    "fullname":"obed chidera",
    "phone":"123344",
    "email":"fruition@gmail.com",
    "make":"toyota",
    "model":"camry",
    "year":2012,
    .....

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




    <div class="endpoint delete">
        <h2>Delete Car</h2>
        <p><strong>Endpoint:</strong> <code>DELETE /api/UpdateCar?id=2</code></p>
        <p><strong>Description:</strong> DELETS a car and its details in the database</p>
        <p><strong>Example Request:</strong></p>
        <pre>DELETE https://seok-young.online/api/deleteCar?id=2</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
  "status": "success",
  "message": "Car deleted successfully"
}
        </pre>
    </div>
    <div class="endpoint delete">
        <h2>Delete Category</h2>
        <p><strong>Endpoint:</strong> <code>DELETE /api/deleteCategory?name=sedan</code></p>
        <p><strong>Description:</strong> DELETS a category</p>
        <p><strong>Example Request:</strong></p>
        <pre>DELETE https://seok-young.online/api/deleteCategory?name=suv</pre>
        <p><strong>Example Request:</strong></p>
        <pre>
{
  "status": "success",
  "message": "Category deleted successfully"
}
        </pre>
    </div>
</body>

</html>