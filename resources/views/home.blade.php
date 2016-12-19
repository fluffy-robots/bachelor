@extends('layouts.app')

@section('content')
<div class="content">

    <div class="section">
      <div class="card">
      <div class="card-image">
      <figure class="image is-4by3">
      <img src="http://placehold.it/300x225" alt="">
      </figure>
      </div>
      <div class="card-content">
      <div class="media">
      <div class="media-left">
      <figure class="image is-32x32">
      <img src="http://placehold.it/64x64" alt="Image">
      </figure>
      </div>
      <div class="media-content">
      <p class="title is-5">{{ Auth::user()->name }}</p>
      <p class="subtitle is-6">@johnsmith</p>
      </div>
      </div>

      <div class="content">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a href="#">@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <small>11:09 PM - 1 Jan 2016</small>
      </div>
      </div>
      </div>
    </div>
    
    <div class="section">
      <article class="media">
      <figure class="media-left">
      <p class="image is-64x64">
      <img src="http://placehold.it/128x128">
      </p>
      </figure>
      <div class="media-content">
      <p class="control">
      <textarea class="textarea" placeholder="Add a comment..."></textarea>
      </p>
      <nav class="level">
      <div class="level-left">
      <div class="level-item">
      <a class="button is-info">Post comment</a>
      </div>
      </div>
      <div class="level-right">
      <div class="level-item">
      <label class="checkbox">
      <input type="checkbox"> Press enter to submit
      </label>
      </div>
      </div>
      </nav>
      </div>
      </article>
    </div>

    <div class="section">
      <article class="media">
      <figure class="media-left">
      <p class="image is-64x64">
      <img src="http://placehold.it/128x128">
      </p>
      </figure>
      <div class="media-content">
      <div class="content">
      <p>
      <strong>Barbara Middleton</strong>
      <br>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris sit amet dolor blandit rutrum. Nunc in tempus turpis.
      <br>
      <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
      </p>
      </div>
    
      <article class="media">
      <figure class="media-left">
      <p class="image is-48x48">
      <img src="http://placehold.it/96x96">
      </p>
      </figure>
      <div class="media-content">
      <div class="content">
      <p>
      <strong>Sean Brown</strong>
      <br>
      Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.
      <br>
      <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
      </p>
      </div>

      <article class="media">
      Vivamus quis semper metus, non tincidunt dolor. Vivamus in mi eu lorem cursus ullamcorper sit amet nec massa.
      </article>

      <article class="media">
      Morbi vitae diam et purus tincidunt porttitor vel vitae augue. Praesent malesuada metus sed pharetra euismod. Cras tellus odio, tincidunt iaculis diam non, porta aliquet tortor.
      </article>
      </div>
      </article>

      <article class="media">
      <figure class="media-left">
      <p class="image is-48x48">
      <img src="http://placehold.it/96x96">
      </p>
      </figure>
      <div class="media-content">
      <div class="content">
      <p>
      <strong>Kayli Eunice </strong>
      <br>
      Sed convallis scelerisque mauris, non pulvinar nunc mattis vel. Maecenas varius felis sit amet magna vestibulum euismod malesuada cursus libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus lacinia non nisl id feugiat.
      <br>
      <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
      </p>
      </div>
      </div>
      </article>
      </div>
      </article>
      <article class="media">
      <figure class="media-left">
      <p class="image is-64x64">
      <img src="http://placehold.it/128x128">
      </p>
      </figure>
      <div class="media-content">
      <p class="control">
      <textarea class="textarea" placeholder="Add a comment..."></textarea>
      </p>
      <p class="control">
      <button class="button">Post comment</button>
      </p>
      </div>
      </article>
    </div>


    <div class="section">
      <article class="message">
      <div class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum felis venenatis efficitur. Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
      </article>
      <article class="message is-primary">
      <div class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum felis venenatis efficitur. Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
      </article>
      <article class="message is-info">
      <div class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum felis venenatis efficitur. Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
      </article>
      <article class="message is-success">
      <div class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum felis venenatis efficitur. Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
      </article>
      <article class="message is-warning">
      <div class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum felis venenatis efficitur. Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
      </article>
      <article class="message is-danger">
      <div class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum felis venenatis efficitur. Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
      </article>
    </div>

</div>
@endsection
