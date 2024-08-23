<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styles for the container */
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Styles for input groups */
        .input-group input {
            border-radius: 4px;
            box-sizing: border-box;
        }

        .input-group-text {
            border-radius: 4px 0 0 4px;
        }

        /* Styles for the profile image section */
        .profile-image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-image-container img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .upload-button {
            background-color: #00C89E; /* Button color */
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.875rem;
            transition: background-color 0.3s ease;
        }

        .upload-button:hover {
            background-color: #009e8b; /* Darker shade for hover effect */
        }

        /* Styles for the submit button */
        .btn-primary {
            background-color: #00C89E; /* Button color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #009e8b; /* Darker shade for hover effect */
        }

        /* Styles for error alerts */
        .alert {
            color: #ff0000;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        /* Styles for file input */
        .custom-file-upload {
            border: 1px solid #ddd;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            background-color: #f8f9fa;
            color: #495057;
        }

        .custom-file-input {
            display: none;
        }

        /* Styles for the back button */
        .btn-secondary {
            background-color: #f8f9fa; /* Light background for the back button */
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-secondary:hover {
            background-color: #e2e6ea; /* Darker shade for hover effect */
        }

        /* Styles for the actions container */
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .actions .btn {
            flex: 1;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- EDIT PROFILE FORM -->
        <h2 class="text-center mb-4">Edit Profile</h2>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Image Section -->
            <div class="profile-image-container">
                <img src="{{ auth()->user()->profile_picture_url ?? asset('images/default-profile.png') }}" alt="Profile Image">
                <label class="custom-file-upload">
                    <input type="file" name="profile_picture" accept="image/*">
                    Upload Profile Picture
                </label>
            </div>

            <!-- Name Input -->
            <div class="form-group">
                <label for="name">Name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class='bx bxs-user'></i></span>
                    </div>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ old('name', auth()->user()->name) }}" required>
                </div>
                @error('name')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class='bx bx-mail-send'></i></span>
                    </div>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" required>
                </div>
                @error('email')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password">New Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class='bx bxs-lock-alt'></i></span>
                    </div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="New Password (optional)">
                </div>
                @error('password')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class='bx bxs-lock-alt'></i></span>
                    </div>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm New Password (optional)">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
            
            <!-- Actions Container -->
            <div class="actions">
                <a href="{{ route('profile.show') }}" class="btn btn-secondary">Back to Profile</a>
                <a href="{{ url('/home') }}" class="btn btn-secondary">Back to Home</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for handling file input preview
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.querySelector('input[name="profile_picture"]');
            const profileImage = document.querySelector('.profile-image-container img');

            fileInput.addEventListener('change', function() {
                const file = fileInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>
