@extends('front.layout.master')

@section('content')

<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="entity_wrapper">
    <div class="entity_title">
        <h1><a href="{{ url('/details') }}/{{ $post->slug }}">{{ $post->title }}</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_meta">
        <a href="{{ url('/author') }}/{{ $post->creator->id }}">{{ $post->creator->name }}</a>, {{ date('F j,Y', strtotime($post->created_at)) }}
    </div>
    <!-- entity_meta -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{ asset('public/post') }}/{{ $post->main_image }}" alt="{{ $post->title }}">
    </div>
    <!-- entity_thumb -->

    <div class="entity_content">
        <p>
            {{ $post->short_description }}
        </p>

        <p>
            {!! $post->description !!}
        </p>
    </div>
    <!-- entity_content -->

    <div class="entity_footer">

        <!-- entity_tag -->

        <div class="entity_social">
            <span><i class="fa fa-comments-o"></i>{{ count($post->comments) }} <a href="#">Comments</a> </span>
        </div>
        <!-- entity_social -->

    </div>
    <!-- entity_footer -->

</div>
<!-- entity_wrapper -->

<div class="related_news">
    <div class="entity_inner__title header_purple">
        <h2><a href="#">Related News</a></h2>
    </div>
    <!-- entity_title -->

    <div class="row">
        @foreach ($related_news as $news)
        <div class="col-md-6">
            <div class="media">
                <div class="media-left">
                    <a href="{{ url('/details') }}/{{ $news->slug }}"><img class="media-object" src="{{ asset('public/post') }}/{{ $news->thumb_image }}"
                                     alt="{{ $news->title }}"></a>
                </div>
                <div class="media-body">
                    <span class="tag purple"><a href="{{ url('/category') }}/{{ $news->category_id }}">{{ $news->category->name }}</a></span>

                    <h3 class="media-heading"><a href="{{ url('/details') }}/{{ $news->slug }}">{{ $news->title }}</a></h3>
                    <span class="media-date">
                        <a href="{{ url('/author') }}/{{ $news->creator->id }}">{{ $news->creator->name }}</a>, {{ date('F j,Y', strtotime($news->created_at)) }}
                    </span>

                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-comments-o"></i>{{ count($news->comments) }}</a> Comments</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Related news -->

<div class="readers_comment">
    <div class="entity_inner__title header_purple">
        <h2>Readers Comment</h2>
    </div>
    <!-- entity_title -->

    <div class="media">
        <div class="media-left">
            <a href="#">
                <img alt="64x64" class="media-object" data-src="{{ asset('public/fronts/img/reader_img1.jpg') }}"
                     src="{{ asset('public/fronts/img/reader_img1.jpg') }}" data-holder-rendered="true">
            </a>
        </div>
        <div class="media-body">
            <h2 class="media-heading"><a href="#">Sr. Ryan</a></h2>
            But who has any right to find fault with a man who chooses to enjoy a pleasure that has
            no annoying consequences, or one who avoids a pain that produces no resultant pleasure?

            <div class="entity_vote">
                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                <a href="#"><span class="reply_ic">Reply </span></a>
            </div>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img alt="64x64" class="media-object" data-src="{{ asset('public/fronts/img/reader_img2.jpg') }}"
                             src="{{ asset('public/fronts/img/reader_img2.jpg') }}" data-holder-rendered="true">
                    </a>
                </div>
                <div class="media-body">
                    <h2 class="media-heading"><a href="#">Admin</a></h2>
                    But who has any right to find fault with a man who chooses to enjoy a pleasure
                    that has no annoying consequences, or one who avoids a pain that produces no
                    resultant pleasure?

                    <div class="entity_vote">
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                        <a href="#"><span class="reply_ic">Reply </span></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- media end -->


</div>
<!--Readers Comment-->

<div class="widget_advertisement">
    <img class="img-responsive" src="{{ asset('public/fronts/img/category_advertisement.jpg') }}" alt="feature-top">
</div>
<!--Advertisement-->

<div class="entity_comments">
    <div class="entity_inner__title header_black">
        <h2>Add a Comment</h2>
    </div>
    <!--Entity Title -->

    <div class="entity_comment_from">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" id="inputName" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group comment">
                <textarea class="form-control" id="inputComment" placeholder="Comment"></textarea>
            </div>

            <button type="submit" class="btn btn-submit red">Submit</button>
        </form>
    </div>
    <!--Entity Comments From -->

</div>
<!--Entity Comments -->

</div>
<!--Left Section-->

    <div class="col-md-4">
        <div class="widget">
            <div class="widget_title widget_black">
                <h2><a href="#">Most Viewed</a></h2>
            </div>
            @foreach($shareData['most_viewed'] as $item)
                <div class="media">
                    <div class="media-left">
                        <a href="{{ url('/details') }}/{{ $item->slug }}"><img class="media-object" src="{{ asset('public/post') }}/{{ $item->thumb_image }}" alt="{{ $item->title }}"></a>

                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="{{ url('/details') }}/{{ $item->slug }}">{{ $item->title }}</a>
                        </h3> <span class="media-date"><a href="#">{{ date('j F - y', strtotime($item->created_at)) }}</a>,  by: <a href="{{ url('/author') }}/{{ $item->creator->id }}">{{ $item->creator->name }}</a></span>

                        <div class="widget_article_social">
                <span>
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{ count($item->comments) }}</a> Comments
                </span>
                        </div>
                    </div>
                </div>
            @endforeach
            <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
        </div>
        <!-- Popular News -->

        <div class="widget hidden-xs m30">
            <img class="img-responsive adv_img" src="{{ asset('public/fronts/img/right_add1.jpg') }}" alt="add_one">
            <img class="img-responsive adv_img" src="{{ asset('public/fronts/img/right_add2.jpg') }}" alt="add_one">
            <img class="img-responsive adv_img" src="{{ asset('public/fronts/img/right_add3.jpg') }}" alt="add_one">
            <img class="img-responsive adv_img" src="{{ asset('public/fronts/img/right_add4.jpg') }}" alt="add_one">
        </div>
        <!-- Advertisement -->

        <div class="widget hidden-xs m30">
            <img class="img-responsive widget_img" src="{{ asset('public/fronts/img/right_add5.jpg') }}" alt="add_one">
        </div>
        <!-- Advertisement -->

        <div class="widget m30">
            <div class="widget_title widget_black">
                <h2><a href="#">Most Commented</a></h2>
            </div>
            @foreach ($shareData['most_commented'] as $item)
                <div class="media">
                    <div class="media-left">
                        <a href="{{ url('/details') }}/{{ $item->slug }}"><img class="media-object" src="{{ asset('public/post') }}/{{ $item->thumb_image }}" alt="{{ $item->title }}"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="{{ url('/details') }}/{{ $item->slug }}">{{ $item->title }}</a>
                        </h3>

                        <div class="media_social">
                            <span><i class="fa fa-comments-o"></i><a href="#">{{ $item->comments_count }}</a> Comments</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
        </div>
        <!-- Most Commented News -->

        <div class="widget m30">
            <div class="widget_title widget_black">
                <h2><a href="#">Editor Corner</a></h2>
            </div>
            <div class="widget_body"><img class="img-responsive left" src="{{ asset('public/fronts/img/editor.jpg') }}"
                                          alt="Generic placeholder image">

                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                    users after installed base benefits. Dramatically visualize customer directed convergence without</p>

                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                    users after installed base benefits. Dramatically visualize customer directed convergence without
                    revolutionary ROI.</p>
                <button class="btn pink">Read more</button>
            </div>
        </div>
        <!-- Editor News -->

        <div class="widget hidden-xs m30">
            <img class="img-responsive add_img" src="{{ asset('public/fronts/img/right_add7.jpg') }}" alt="add_one">
            <img class="img-responsive add_img" src="{{ asset('public/fronts/img/right_add7.jpg') }}" alt="add_one">
            <img class="img-responsive add_img" src="{{ asset('public/fronts/img/right_add7.jpg') }}" alt="add_one">
            <img class="img-responsive add_img" src="{{ asset('public/fronts/img/right_add7.jpg') }}" alt="add_one">
        </div>
        <!--Advertisement -->

        <div class="widget m30">
            <div class="widget_title widget_black">
                <h2><a href="#">Readers Corner</a></h2>
            </div>
            <div class="widget_body"><img class="img-responsive left" src="{{ asset('public/fronts/img/reader.jpg') }}"
                                          alt="Generic placeholder image">

                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                    users after installed base benefits. Dramatically visualize customer directed convergence without</p>

                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                    users after installed base benefits. Dramatically visualize customer directed convergence without
                    revolutionary ROI.</p>
                <button class="btn pink">Read more</button>
            </div>
        </div>
        <!--  Readers Corner News -->

        <div class="widget hidden-xs m30">
            <img class="img-responsive widget_img" src="{{ asset('public/fronts/img/podcast.jpg') }}" alt="add_one">
        </div>
        <!--Advertisement-->
    </div>
    <!-- Right Section -->

</div>
<!-- row -->

</div>
<!-- container -->

</section>
<!-- Entity Section Wrapper -->

@endsection