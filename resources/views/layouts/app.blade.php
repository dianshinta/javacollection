<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Java Collection</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #fdecea;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 800px;
            height: 550px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .lupapass {
            display: flex;
            width: 450px;
            height: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .form-section {
            flex: 1;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 40px;
        }

        .form-section h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .form-section .input-group {
            margin-bottom: 15px;
        }

        .form-section .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }

        .form-section .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-section button {
            background-color: #6b0f0f;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-section button:hover {
            background-color: #500d0d;
        }

        .form-section .link-group {
            text-align: center;
            margin-top: 15px;
        }

        .form-section .link-group a {
            color: #6b0f0f;
            text-decoration: none;
            font-size: 14px;
        }

        .form-section .link-group a:hover {
            text-decoration: underline;
        }

        .image-section {
            flex: 1;
            background: linear-gradient(to right, #6b0f0f, #500d0d);
        }

        .radio-group {
    display: flex; /* Gunakan flexbox untuk membuat elemen berjajar */
    gap: 20px; /* Jarak antar radio button */
    margin-top: 10px; /* Jarak antara label "Jabatan" dan radio buttons */
}

.radio-group label {
    display: flex;
    align-items: center; /* Pusatkan teks dengan radio button secara vertikal */
    cursor: pointer; /* Ubah kursor saat dihover */
}

.radio-group input[type="radio"] {
    margin-right: 5px; /* Jarak kecil antara radio button dan teks */
}

    </style>
</head>
<body>
    <div id="app">
        <main class="py">
            @yield('content')
        </main>
    </div>
</body>
</html>