@extends('front.layout.master')

@section('content')

<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Tech</a></li>
                <li class="active"><a href="#">Mobile</a></li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
<div class="row">
<div class="col-md-8">
<div class="entity_wrapper">
    <div class="entity_title header_purple">
        <h1><a href="category.html" target="_blank">Mobile</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{ asset('public/fronts/img/category_img_top.jpg') }}" alt="feature-top">
    </div>
    <!-- entity_thumb -->

    <div class="entity_title">
        <a href="single.html" target="_blank"><h3> Airbnb launches photo-centric app for iPads and Android
            tablets. </h3></a>
    </div>
    <!-- entity_title -->

    <div class="entity_meta">
        <a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_content">
        Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users
        after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.
    </div>
    <!-- entity_content -->

    <div class="entity_social">
        <span><i class="fa fa-share-alt"></i>424 <a href="#">Shares</a> </span>
        <span><i class="fa fa-comments-o"></i>4 <a href="#">Comments</a> </span>
    </div>
    <!-- entity_social -->

</div>
<!-- entity_wrapper -->

<div class="row">
    <div class="col-md-6">
        <div class="category_article_body">
            <div class="top_article_img">
                <img class="img-fluid" src="{{ asset('public/fronts/img/category_img1.jpg') }}" alt="feature-top">
            </div>
            <!-- top_article_img -->

            <div class="category_article_title">
                <h5><a href="single.html" target="_blank">Airbnb launches photo-centric app for iPads and Android
                    tablets. </a></h5>
            </div>
            <!-- category_article_title -->

            <div class="article_date">
                <a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
            </div>
            <!-- article_date -->

            <div class="category_article_content">
                Collaboratively administrate empowered markets via plug-and-play networks.
                Dynamically procrastinate B2C users after installed base benefits. Dramatically
                visualize customer directed convergence without revolutionary ROI.
            </div>
            <!-- category_article_content -->

            <div class="article_social">
                <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
            </div>
            <!-- article_social -->

        </div>
        <!-- category_article_body -->

    </div>
    <!-- col-md-6 -->

    <div class="col-md-6">
        <div class="category_article_body">
            <div class="top_article_img">
                <img class="img-responsive" src="{{ asset('public/fronts/img/category_img2.jpg') }}" alt="feature-top">
            </div>
            <!-- top_article_img -->

            <div class="category_article_title">
                <h5><a href="single.html" target="_blank">Airbnb launches photo-centric app for iPads and Android
                    tablets. </a></h5>
            </div>
            <!-- category_article_title -->

            <div class="article_date">
                <a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
            </div>
            <!-- article_date -->

            <div class="category_article_content">
                Collaboratively administrate empowered markets via plug-and-play networks.
                Dynamically procrastinate B2C users after installed base benefits. Dramatically
                visualize customer directed convergence without revolutionary ROI.
            </div>
            <!-- category_article_content -->

            <div class="article_social">
                <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
            </div>
            <!-- article_social -->

        </div>
        <!-- category_article_body -->

    </div>
    <!-- col-md-6 -->

</div>
<!-- row -->

<div class="widget_advertisement">
    <img class="img-responsive" src="{{ asset('public/fronts/img/category_advertisement.jpg') }}" alt="feature-top">
</div>
<!-- widget_advertisement -->


<nav aria-label="Page navigation" class="pagination_section">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#" aria-label="Next" class="active"> <span aria-hidden="true">&raquo;</span> </a>
        </li>
    </ul>
</nav>
<!-- navigation -->

</div>
<!-- col-md-8 -->

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
    <!-- Row -->

</div>
<!-- Container -->

@endsection