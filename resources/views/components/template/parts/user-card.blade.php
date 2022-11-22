<div class="user-card border p-2 bg-primary rounded">
    <div class="inner px-1 py-2 d-flex flex-column justify-centent-start align-items-center">
        <div class="profile rounded-circle overflow-hidden bg-light border border-light">
            <img class="w-100 h-100" src="{{asset('./media/profile.svg')}}" alt="/">
        </div>
        <div class="text-center w-100 py-2">
            <h4 class="h4 text-light text-capitalize user-name" id="userName" style="letter-spacing: 1.5px;">
                {{$user->name ?? "Joen Doe"}}
            </h4>
            <h6 class="text-light fw-bold small info-email">
                {{$user->role ?? "client"}}
            </h6>
        </div>
        <div class="mt-2 w-100">
            <ul class="w-100  px-0 px-sm-2 px-md-3 px-lg-4">
                <li class="user-info my-2 d-flex justify-content-start align-items-center bg-light">
                    <i class="fas fa-phone me-2 text-center text-primary border-end"></i>
                    <span class="fw-bold text-primary" id="userPhone">
                        {{$user->phone_number ?? "+2131234567"}}
                    </span>
                </li>
                <li class="user-info my-2 d-flex justify-content-start align-items-center bg-light">
                    <i class="fas fa-envelope me-2 text-center text-primary border-end"></i>
                    <span class="fw-bold text-primary" id="userEmail">
                        {{$user->email ?? "joen.doe@example.com"}}
                    </span>
                </li>
                <li class="user-info my-2 d-flex justify-content-start align-items-center bg-light">
                    <i class="fas fa-earth-americas me-2 text-center text-primary border-end"></i>
                    <span class="fw-bold text-primary" id="userCountry">
                        {{$user->country ?? "atlantis"}}
                    </span>
                </li>
                <li class="user-info my-2 d-flex justify-content-start align-items-center bg-light">
                    <i class="bi bi-patch-check-fill me-2 text-center text-primary border-end"></i>
                    <span class="fw-bold text-primary" id="userValidity">
                        perfect
                    </span>
                </li>
                <li class="user-info my-3 d-flex justify-content-around align-items-center ">
                    <a href="#">
                        <i class="fab fa-facebook-f bg-light text-primary rounded-circle text-center"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter bg-light text-primary rounded-circle text-center"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram bg-light text-primary rounded-circle text-center"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-linkedin bg-light text-primary rounded-circle text-center"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center align-items-center">
            <a href="#" class="btn btn-light d-flex" id="chatBtn">
                <i class="bi bi-messenger me-2 text-primary"></i>
                <span class="text-primary">
                    contact
                </span>
            </a>
        </div>
    </div>
</div>