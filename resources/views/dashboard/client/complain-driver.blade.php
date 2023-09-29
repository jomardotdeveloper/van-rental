@extends('../../dashboard.template.client-dashboard-template')

@section('title') Message Driver @endsection

@section('links')
<style>
  .complainDriver-container {
    width: 100vw;
    height: 100vh;
  }

  .complainDriver-container > .message-card {
    border: 1px solid black;
    border-radius: 15px;
    width: 85vw;
    height: 70vh;
  }

  .complainDriver-container > .message-card > .driver-details > .bxs-user {
    font-size: 2.5rem;
  }

  .complainDriver-container > .message-card > .driver-details > .driver-name {
    font-size: 1.5rem;
    color: var(--theme);
  }
  
  .complainDriver-container > .message-card > .user-complain {
    display: flex;
    flex-direction: column;
    height: fit-content;
    height: 80%;
    gap: 15px;
  }

  .complainDriver-container > .message-card > .user-complain > textarea {
    border-radius: 30px;
    border: 1px solid black;
    padding: 15px;
    height: 50rem;
    resize: none;
  }

  .complainDriver-container > .message-card > .user-complain > .btn.btn-danger {
    align-self: center;
    width: 170px;
  }

  /* Media queries */

  @media (min-width: 360px) {
    .complainDriver-container > .message-card {
      width: 80vw;
      height: 50vh;
    }
    .complainDriver-container > .message-card > .driver-details > .bxs-user {
      font-size: 1.3rem;
    }

    .complainDriver-container > .message-card > .driver-details > .driver-name {
      font-size: 0.9rem;
      color: var(--theme);
      }
  }

  @media (min-width: 400px) {
    .complainDriver-container > .message-card {
      width: 80vw;
      height: 55vh;
    }
    .complainDriver-container > .message-card > .driver-details > .bxs-user {
      font-size: 1.6rem;
    }

    .complainDriver-container > .message-card > .driver-details > .driver-name {
      font-size: 1.1rem;
      color: var(--theme);
      }
  }

  @media (min-width: 420px) {
    .complainDriver-container > .message-card {
      width: 80vw;
      height: 55vh;
    }
    .complainDriver-container > .message-card > .driver-details > .bxs-user {
      font-size: 1.6rem;
    }

    .complainDriver-container > .message-card > .driver-details > .driver-name {
      font-size: 1.1rem;
      color: var(--theme);
      }
  }

  @media (min-width: 450px) {
    .complainDriver-container > .message-card > .driver-details > .bxs-user {
      font-size: 1.8rem;
    }

    .complainDriver-container > .message-card > .driver-details > .driver-name {
      font-size: 1.2rem;
      color: var(--theme);
      }
  }

  @media (min-width: 480px) {
    .complainDriver-container > .message-card {
      width: 70vw;
      height: 55vh;
    }

    .complainDriver-container > .message-card > .driver-details > .bxs-user {
      font-size: 2rem;
    }

    .complainDriver-container > .message-card > .driver-details > .driver-name {
      font-size: 1.3rem;
      color: var(--theme);
      }
    }

</style>
@endsection

@section('content')

<div class="complainDriver-container row justify-content-center p-5">
  <form class="message-card" action="" method="POST">
    <div class="driver-details d-flex align-items-center p-2 gap-2">
      <i class='bx bxs-user'></i>
      <div class="driver-name">JOHN DOE DEE NALIGO</div>
    </div>
    <div class="user-complain">
      <textarea placeholder="INPUT YOUR COMPLAIN" id="message"> </textarea>
      <button class="btn btn-danger">Submit</button>
    </div>
  </form>
</div>

@endsection