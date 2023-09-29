{{-- @extends('dashboard.layouts.driver-dashboard') --}}
{{-- @section('links')
    <style>
        .wrappers {
            margin: 6rem auto;
            background: #fff;
            max-width: 450px;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                0 32px 64px -48px rgba(0, 0, 0, 0.5);
        }

        /* Chat Area CSS Start */
        .chat-area header {
            display: flex;
            align-items: center;
            padding: 18px 30px;
        }

        .chat-area header .back-icon {
            color: #333;
            font-size: 18px;
        }

        .chat-area header img {
            height: 45px;
            width: 45px;
            margin: 0 15px;
        }

        .chat-area header .details span {
            font-size: 17px;
            font-weight: 500;
        }

        .chat-box {
            position: relative;
            min-height: 500px;
            max-height: 500px;
            overflow-y: auto;
            padding: 10px 30px 20px 30px;
            background: #f7f7f7;
            box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
        }

        .chat-box .text {
            position: absolute;
            top: 45%;
            left: 50%;
            width: calc(100% - 50px);
            text-align: center;
            transform: translate(-50%, -50%);
        }

        .chat-box .chat {
            margin: 15px 0;
        }

        .chat-box .chat p {
            word-wrap: break-word;
            padding: 8px 16px;
            box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                0rem 16px 16px -16px rgb(0 0 0 / 10%);
        }

        .chat-box .outgoing {
            display: flex;
        }

        .chat-box .outgoing .details {
            margin-left: auto;
            max-width: calc(100% - 130px);
        }

        .outgoing .details p {
            background: var(--primary-color);
            color: #fff;
            border-radius: 18px 18px 0 18px;
        }

        .chat-box .incoming {
            display: flex;
            align-items: flex-end;
        }

        .chat-box .incoming img {
            height: 35px;
            width: 35px;
        }

        .chat-box .incoming .details {
            margin-right: auto;
            margin-left: 10px;
            max-width: calc(100% - 130px);
        }

        .incoming .details p {
            background: #fff;
            color: var(--primary-color);
            border-radius: 18px 18px 18px 0;
        }

        .typing-area {
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
        }

        .typing-area input {
            height: 45px;
            width: calc(100% - 58px);
            font-size: 16px;
            padding: 0 13px;
            border: 1px solid #e6e6e6;
            outline: none;
            border-radius: 5px 0 0 5px;
        }

        .typing-area button {
            color: #fff;
            width: 55px;
            border: none;
            outline: none;
            background: var(--primary-color);
            font-size: 19px;
            cursor: pointer;
            opacity: 0.9;
            pointer-events: none;
            border-radius: 0 5px 5px 0;
            transition: all 0.3s ease;
        }

        .typing-area button.active {
            opacity: 1;
            pointer-events: auto;
        }

        /* Responive media query */
        @media screen and (max-width: 450px) {
            /* .form, .users{
            padding: 20px;
          }
          .form header{
            text-align: center;
          }
          .form form .name-details{
            flex-direction: column;
          }
          .form .name-details .field:first-child{
            margin-right: 0px;
          }
          .form .name-details .field:last-child{
            margin-left: 0px;
          }

          .users header img{
            height: 45px;
            width: 45px;
          }
          .users header .logout{
            padding: 6px 10px;
            font-size: 16px;
          }
          :is(.users, .users-list) .content .details{
            margin-left: 15px;
          }

          .users-list a{
            padding-right: 10px;
          } */

            .chat-area header {
                padding: 15px 20px;
            }

            .chat-box {
                min-height: 400px;
                padding: 10px 15px 15px 20px;
            }

            .chat-box .chat p {
                font-size: 15px;
            }

            .chat-box .outogoing .details {
                max-width: 230px;
            }

            .chat-box .incoming .details {
                max-width: 265px;
            }

            .incoming .details img {
                height: 30px;
                width: 30px;
            }

            .chat-area form {
                padding: 20px;
            }

            .chat-area form input {
                height: 40px;
                width: calc(100% - 48px);
            }

            .chat-area form button {
                width: 45px;
            }
        }
    </style>
@endsection --}}
{{-- @section('contents')
    <div class="wrappers">
        <section class="chat-area">
            <header>
                <a href="{{ route('driver.home') }}" class="back-icon"><i class="bx bx-left-arrow-alt h1"></i></a>
                <img src="https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png" alt="">
                <div class="details">
                    <span>Jaypee Quintana</span>
                    <p>Active now</p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, provident exercitationem ea,
                            repellat corrupti at minus fugit culpa similique nam aut atque consequuntur, expedita deleniti
                            eius quos est maxime? Ratione.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, provident exercitationem ea,
                            repellat corrupti at minus fugit culpa similique nam aut atque consequuntur, expedita deleniti
                            eius quos est maxime? Ratione.</p>
                    </div>
                </div>
            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                    autocomplete="off">
                <button><i class="bx bxs-paper-plane"></i></button>
            </form>
        </section>
    </div>
@endsection --}}


@section('driver.chat.customer')
    {{-- <div class="container">
        <div class="row"> --}}
            {{-- <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12"> --}}
                <div class="offcanvas offcanvas-end p-2" tabindex="-1" id="chat-customer"
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
                                <div class="details secondary-color">
                                    <span id="user_header_name">Jaypee asdsad</span>
                                    <p>Active now</p>
                                </div>
                            </header>
                            <div class="chat-box">

                            </div>
                            <form action="#" class="typing-area">
                                {{-- user who recieve message --}}
                                <input type="number" class="incoming_id" id="incoming_id" name="incoming_id" hidden>
                                <input type="text" name="message" class="input-field-driver"
                                    placeholder="Type a message here..." autocomplete="off">
                                <button id="driver-btn"><i class="bx bxs-paper-plane"></i></button>
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

