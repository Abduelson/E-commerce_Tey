<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AjoutProduit</title>
    <link rel="stylesheet" href="Css/style_admin.css">
</head>

<body>
    <div class="container_Ajoutproduit">
        <h1>Add Product</h1>
        <form action="configuration/Admin_AddProduit.php" method="POST" class="form" enctype="multipart/form-data">
           <div class="Name">
                <label>Name</label>
                <input type="text" name="Name" id="Name" placeholder="Name">
           </div>

           <div class="Price">
                <label>Price</label>
                <input type="number" name="Price" id="Price" placeholder="Price">
           </div>

           <div class="Description">
                <label>Description</label>
                <input type="text" name="Description" id="Description" placeholder="Description">
           </div>

           <div class="Quantity">
                <label>Quantity</label>
                <input type="number" name="Quantity" id="Quantity" placeholder="Quantity">
           </div>

           <div class="Date">
                <label>Date</label>
                <input type="datetime-local" name="Date" id="Date" placeholder="Date">
           </div>

           <div class="Image">
                <label>Image</label>
                <input type="file" name="Image" class="im" accept="image/*">
           </div>
           <input type="submit" value="Ajouter" class="btn">
        </form>
    </div>
</body>

</html>