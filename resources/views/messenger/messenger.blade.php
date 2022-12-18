<x-template.guest>
    <x-main.guest.navbar />

    <div class="w-100 p-2 bg-dark" style="height: 90vh;">
        <div class="w-100 h-100 px-1 px-md-2 px-lg-5">
            <div class="row h-100 border overflow-hidden bg-light" style="white-space: nowrap;flex-wrap:nowrap">
                <div class="col-12 col-sm-3 col-lg-4 h-100 border" id="chatPanel">
                    <div class="header-banner bg-light w-100 p-0 d-flex justify-content-around align-items-center" style="height: 8vh;">
                        <i class="fas fa-comment mx-2 text-success" style="font-size: 1.3rem;"></i>
                        <span class="h5 mx-2 my-0 p-0 d-block d-sm-none d-md-block">
                            Chats
                        </span>
                        <div class="seach-banner text-light bg-dark wrapper w-auto" style="height: 6vh;border-radius: 6vh;">
                            <input type="text" placeholder="search..." class="w-75 h-100 outline-none" style="border:none!important;background: none;" />
                            <i class="fas fa-search w-25 text-center" style="line-height: 6vh;cursor:pointer;"></i>
                        </div>
                    </div>
                    <div class="chats-wrapper w-100">
                        <div class="chats w-100 px-1 px-md-2 px-lg-3 mx-2 my-0">
                            <div class="h5 text-primary fw-bold text-center my-5">
                                no chats yet
                            </div>
                            <!-- <div class="chat w-100 px-1 m-0 d-flex justify-content-start align-items-center">

                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-9 col-lg-8 h-100 border">
                    <div class="header-banner bg-light w-100 p-0 d-flex justify-content-start align-items-center" style="height: 8vh;">
                       <a href="#chatPanel" class="d-flex d-sm-none">
                            <i class="fas fa-arrow-left cursor-pointer mx-4 text-primary" style="font-size: 1.3rem;" id="toChatsPannel"></i>
                       </a>
                        <span class="d-block rounded-circle overflow-hidden border-2 border-primary mx-2" style="
                        width: 6vh;
                        height : 6vh;">
                            <img src="https://images.unsplash.com/photo-1628563694622-5a76957fd09c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW5zdGFncmFtJTIwcHJvZmlsZXxlbnwwfHwwfHw%3D&w=1000&q=80" alt="profile_picture" class="w-100 h-100 rounded-circle">
                        </span>
                        <span class="h5 mx-2 my-0 py-0 text-dark">
                            Karim Aouaouda
                        </span>
                        <span class="bg-{{'success'}} rounded-circle p-0 mt-1 mx-4" style="
                        width: 10px;
                        height:10px;
                        ">
                        </span>
                        <div class="w-100 d-flex justify-content-end mx-2 cursor-pointer pb-2" style="flex:1">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#menuModal" style="
                            letter-spacing:1.5px;
                            font-weight:700;
                        ">
                                ...
                            </button>
                        </div>
                    </div>
                    <div class="w-100 bg-light" style="height: calc(100% - 8vh - 8vh);">
                        <div class="inner w-100 h-100 d-flex justify-content-center align-items-center flex-column">
                            <i class="fas fa-comment text-primary" style="
                            text-shadow: 4px 4px 14px #aaa;
                            font-size: 10rem;
                            "></i>
                            <p class="text-secondary h4 my-2 px-0 py-2 px-0">
                                please chose a chat to open it
                            </p>
                        </div>
                    </div>
                    <div class="form-wrapper w-100 bg-light border-dark" style="height: 8vh;">
                        <div class="inner w-100 h-100 border px-1 px-md-2 px-lg-4 d-flex justify-content-center align-items-center">
                            <input type="text" class="w-75 rounded" placeholder="your message ..." id="message" />
                            <i class="fas fa-paper-plane my-0 py-0 text-primary h4 mx-1 mx-md-3 mx-lg-4 px-4 h-100 border rounded" style="line-height: 8vh;cursor:pointer;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="menuModelLabel">Chat menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-100">
                        <div class="option px-2 btn btn-light fw-bold">
                            <i class="fas fa-times mx-2 h4 text-danger">

                            </i>
                            <span class="h4">
                                delete coversation
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="w-100">
                        <div class="option px-2 btn btn-light fw-bold">
                            <i class="fas fa-check mx-2 h4 text-success">

                            </i>
                            <span class="h4">
                                other option
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">confirm</button>
                </div>
            </div>
        </div>
    </div>
</x-template.guest>