<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jersey Sublimation Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            background-color: orange;
            border-color: orange;
        }
        .btn-primary:hover {
            background-color: darkorange;
            border-color: darkorange;
        }
        body {
            background-color: #f8f9fa;
        }
        .form-section {
            background-color: orange;
            padding: 20px;
            color: white;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .form-select option:hover {
            background-color: darkorange;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Jersey Sublimation Order Form</h1>
        <form action="submit_order.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- Customer Information -->
                <div class="col-md-6 form-section">
                    <h4 class="mb-3">Customer Information</h4>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter your contact number" required>
                    </div>
                    <div class="mb-3">
                        <label for="deliveryAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="deliveryAddress" name="deliveryAddress" rows="3" placeholder="Enter your address"></textarea>
                    </div>
                </div>

                <!-- Order Details -->
                <div class="col-md-6 form-section">
                    <h4 class="mb-3">Order Details</h4>
                    <div class="mb-3">
                        <label for="jerseyType" class="form-label">Jersey Type</label>
                        <select class="form-select" id="jerseyType" name="jerseyType" required>
                            <option value="">Select Jersey Type</option>
                            <option value="basketball">Basketball</option>
                            <option value="volleyball">Volleyball</option>
                            <option value="soccer">Soccer/Football</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="materialPreference" class="form-label">Material Preference</label>
                        <select class="form-select" id="materialPreference" name="materialPreference">
                            <option value="">Select Material</option>
                            <option value="dri-fit">Dri-Fit</option>
                            <option value="cotton-blend">Cotton Blend</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" placeholder="Enter quantity" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Design Options -->
                <div class="col-md-6 form-section">
                    <h4 class="mb-3">Design Options</h4>
                    <div class="mb-3">
                        <input type="radio" id="chooseDesign" name="designOption" value="Choose Design" required>
                        <label for="chooseDesign">Choose from available designs</label>
                        <input type="text" class="form-control mt-2 d-none" id="designId" name="designId" placeholder="Enter Design ID">
                    </div>
                    <div class="mb-3">
                        <input type="radio" id="uploadDesign" name="designOption" value="Upload Design" required>
                        <label for="uploadDesign">Upload your design</label>
                        <input type="file" class="form-control mt-2 d-none" id="designUpload" name="designUpload" accept=".png, .jpg">
                    </div>
                </div>

                <!-- Color Preferences -->
                <div class="col-md-6 form-section">
                    <h4 class="mb-3">Color Preferences</h4>
                    <p>(Please choose your preferred color if you opted to choose from available designs. If not write N/A)</p>
                    <div class="mb-3">
                        <input type="radio" id="defaultColor" name="colorPreference" value="Default" required>
                        <label for="defaultColor">Default Color</label>
                    </div>
                    <div class="mb-3">
                        <input type="radio" id="customColor" name="colorPreference" value="Other" required>
                        <label for="customColor">Other:</label>
                        <input type="text" class="form-control mt-2" name="customColor" placeholder="Specify your color">
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Customization and Notes -->
                <div class="col-md-12 form-section">
                    <h4 class="mb-3">Customization Options</h4>
                    <p>(Upload png/jpg file with list of player's jersey name, number, and size)</p>
                    <input type="file" class="form-control mb-3" id="customization" name="customization" accept=".png, .jpg">
                    <div class="mb-3">
                        <label for="completionDate" class="form-label">Preferred Completion Date</label>
                        <input type="date" class="form-control" id="completionDate" name="completionDate" required>
                    </div>
                    <label for="additionalNotes" class="form-label">Additional Notes</label>
                    <textarea class="form-control" id="additionalNotes" name="additionalNotes" rows="3" placeholder="Enter any additional instructions or comments"></textarea>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Submit Order</button><br><br><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const chooseDesign = document.getElementById('chooseDesign');
        const uploadDesign = document.getElementById('uploadDesign');
        const designId = document.getElementById('designId');
        const designUpload = document.getElementById('designUpload');

        chooseDesign.addEventListener('change', () => {
            designId.classList.remove('d-none');
            designId.required = true;
            designUpload.classList.add('d-none');
            designUpload.required = false;
        });

        uploadDesign.addEventListener('change', () => {
            designUpload.classList.remove('d-none');
            designUpload.required = true;
            designId.classList.add('d-none');
            designId.required = false;
        });
    </script>
</body>
</html>
