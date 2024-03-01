<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

        #sidebar-wrapper {
            margin-left: -15rem;
            height: 98vh;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
            display: flex;
            flex-direction: column;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }

        #logout-menu {
            color: #dc3545;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }

        #logout-menu i {
            margin-right: 5px;
        }

        #logout-button {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="d-flex position-absolute" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="/dashboard/students" class="list-group-item list-group-item-action bg-light">Student</a>
                <a href="/dashboard/grade" class="list-group-item list-group-item-action bg-light">Grade</a>
            </div>
            <div id="logout-menu" class="mt-auto">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block" id="logout-button" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>