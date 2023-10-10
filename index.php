<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>light user list - Bootdey.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        

    </head>

    <body> 

        <template id="user">  
            <div class="candidate">
                <div class="title">
                    <div class="thumb">
                        <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                    </div>
                    <div class="candidate-list-details">
                        <div class="candidate-list-info">
                            <div class="candidate-list-title">
                                <h5 class="mb-0" data-user = "fullname"><a href="#"></a></h5>
                            </div>
                            <div class="candidate-list-option">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-phone pr-1" data-user = "phone"></i></li>
                                    <li><i class="fas fa-envelope pr-1" data-user = "email"></i></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="candidate-list-favourite-time">
                    <a class="candidate-list-favourite order-2 text-danger" href="#">
                        <i class="fas fa-heart"></i>
                    </a>
                    <label for="">
                        <span class="candidate-list-time order-1" data-user="budget"></span>
                        <input class="candidate-list-time order-1" type="text" data-user="budget" name="edit-user-budget" id="edit-user-budget" disabled>
                    </label>
                    
                </div>
                <div class ="condidate__action">
                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                        <!-- <li><a href="#" class="text-primary" data-toggle="tooltip" title="" data-original-title="view"><i class="far fa-eye"></i></a></li> -->
                        <li><p href="#" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></p></li>
                        <!-- <li><a href="#" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </template>
            
        <div class="container">
            <form action="" method="get" id="user-params">
                <label for="user-param__value">
                    <input type="text" name="user-param__value" id="user-param__value">
                </label>
            </form>
        </div>
    
        <div class="container mt-3 mb-4">
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                            <div class="table manage-candidates-top mb-0" >
                                <div>
                                    <ul class="user-dashboard___header list-unstyled">
                                        <li>Покупатель</li>
                                        <li class="text-center">Кол-во бонусов</li>
                                        <li class="action text-right">Action</li>
                                    </tr>
                                </div>
                                <div id="usersList"> 
                                    <!-- <tr class="candidates-list">
                                        <td class="title">
                                            <div class="thumb">
                                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                            </div>
                                            <div class="candidate-list-details">
                                                <div class="candidate-list-info">
                                                    <div class="candidate-list-title">
                                                        <h5 class="mb-0"><a href="#">Brooke Kelly</a></h5>
                                                    </div>
                                                    <div class="candidate-list-option">
                                                        <ul class="list-unstyled">
                                                            <li><i class="fas fa-filter pr-1"></i>Information Technology</li>
                                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Rolling Meadows, IL 60008</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="candidate-list-favourite-time text-center">
                                            <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-heart"></i></a>
                                            <span class="candidate-list-time order-1">Shortlisted</span>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                <li><a href="#" class="text-primary" data-toggle="tooltip" title="" data-original-title="view"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                                                <li><a href="#" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="script.js"></script>

    </body>
</html>