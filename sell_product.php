<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product</title>
    <link rel="stylesheet" href="sell_product.css">
</head>
<body>
    <div class="container">
        <h1>Sell a Product</h1>
        <form action="sell_product_process.php" method="post" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required><br><br>

            <label for="product_description">Product Description:</label>
            <textarea id="product_description" name="product_description" required></textarea><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required><br><br>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="available">Available</option>
                <option value="date">Set Date</option>
            </select><br><br>

            <div id="date_input" style="display: none;">
                <label for="available_date">Available Date:</label>
                <input type="date" id="available_date" name="available_date"><br><br>
            </div>

            <label for="product_image">Product Image:</label>
            <input type="file" id="product_image" name="product_image">
            <button type="submit">Sell Product</button>
        </form>
        <a href="profile_farmer.php" class="cancel-button">Cancel</a>
    </div>

    <script>
        const statusSelect = document.getElementById('status');
        const dateInput = document.getElementById('date_input');

        statusSelect.addEventListener('change', () => {
            if (statusSelect.value === 'date') {
                dateInput.style.display = 'block';
            } else {
                dateInput.style.display = 'none';
            }
        });
    </script>
</body>
</html>
