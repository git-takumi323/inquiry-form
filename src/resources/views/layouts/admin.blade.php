/* 一般スタイリング */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
    color: #333;
}

h1 {
    text-align: center;
    margin-top: 20px;
    font-size: 24px;
    color: #5a4e4d;
}

form {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 20px auto;
    padding: 20px;
    max-width: 800px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

form input,
form select,
form button {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 10px;
}

form button {
    background-color: #8c7d77;
    color: white;
    border: none;
    cursor: pointer;
}

form button:hover {
    background-color: #5a4e4d;
}

table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
}

table thead {
    background-color: #8c7d77;
    color: white;
}

table th,
table td {
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
}

table th {
    font-weight: bold;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

/* モーダルウィンドウ */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal:target {
    display: flex;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    max-width: 400px;
    text-align: center;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.close-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    text-decoration: none;
    font-size: 20px;
    color: black;
}
