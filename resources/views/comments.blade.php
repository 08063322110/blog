  

  <form action="{{route('posts.comments', $post->id)}}" method="POST" enctype="multipart/form-data">

    <div class="form-floating">
        <textarea class="form-control" placeholder="Write a commnet..." id="floatingTextarea"></textarea>
        <label for="floatingTextarea"></label>
    </div>

  </form>