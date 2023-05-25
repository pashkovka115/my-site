<div class="contact-form">
  <h4 class="contact-form-title">Напишите мне!</h4>
  <p class="desc">Здесь Вы можете написать мне по любомому поводу.</p>
  <form action="{{ route('site.feedback.store') }}" method="post">
    @csrf
    <div class="row row-gutter-20">
      <div class="col-md-6">
        <div class="form-group">
          <input class="form-control" type="text" name="name" placeholder="Имя" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Email"
                 required>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <textarea class="form-control" name="description" placeholder="Сообщение" required></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <button class="btn btn-theme" type="submit">Отправить</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!--== Message Notification ==-->
<div class="form-message"></div>
