@section('client.chat.driver')
    {{-- <div class="container">
        <div class="row"> --}}
            {{-- <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12"> --}}
                <div class="offcanvas offcanvas-end p-2" tabindex="-1" id="chat-driver-side"
                    aria-labelledby="offcanvasRightLabel">
                    <!-- Offcanvas content remains the same -->
                    {{-- <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Talk to Jaypee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div> --}}
                    <div class="offcanvas-body wrappers">
                        <section class="chat-area">
                            <header>
                                <a href="#" class="back-icon" data-bs-dismiss="offcanvas" aria-label="Close"><i
                                        class="bx bx-left-arrow-alt h1"></i></a>
                                <img src="https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png"
                                    alt="">
                                <div class="details">
                                    <span id="user_header_name">Jaypee asd</span>
                                    <p>Active now</p>
                                </div>
                            </header>
                            <div class="chat-box">

                            </div>
                            <form action="#" class="typing-area">
                                {{-- user who recieve message --}}
                                <input type="number" class="incoming_id" id="incoming_id" name="incoming_id" hidden>
                                <input type="text" name="message" class="input-field"
                                    placeholder="Type a message here..." autocomplete="off">
                                <button><i class="bx bxs-paper-plane"></i></button>
                            </form>
                        </section>
                        {{-- <div class="wrappers">
                            <section class="chat-area">
                                <header>
                                    <a href="#" class="back-icon" data-bs-dismiss="offcanvas" aria-label="Close"><i
                                            class="bx bx-left-arrow-alt h1"></i></a>
                                    <img src="https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png"
                                        alt="">
                                    <div class="details">
                                        <span>Jaypee Quintana</span>
                                        <p>Active now</p>
                                    </div>
                                </header>
                                <div class="chat-box">
                                    <div class="chat outgoing">
                                        <div class="details">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, provident
                                                exercitationem ea, repellat corrupti at minus fugit culpa similique nam aut
                                                atque consequuntur, expedita deleniti eius quos est maxime? Ratione.</p>
                                        </div>
                                    </div>
                                    <div class="chat incoming">
                                        <img src="https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png"
                                            alt="">
                                        <div class="details">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, provident
                                                exercitationem ea, repellat corrupti at minus fugit culpa similique nam aut
                                                atque consequuntur, expedita deleniti eius quos est maxime? Ratione.</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="#" class="typing-area">
                                    <input type="text" class="incoming_id" name="incoming_id" value="" hidden>
                                    <input type="text" name="message" class="input-field"
                                        placeholder="Type a message here..." autocomplete="off">
                                    <button><i class="bx bxs-paper-plane"></i></button>
                                </form>
                            </section>
                        </div> --}}
                    </div>
                </div>
            {{-- </div> --}}
        {{-- </div>
    </div> --}}
@endsection
