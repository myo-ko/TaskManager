@extends('index')
@section('title', 'Home')

@section('content')
<div class="milestones">
    <h2 class="late">Late Milestones</h2>
    <ol class="overdue">
        <li>
            <a href="#">Lorem ipsum dolor sit amet</a>
            <time>Due: 2016-12-11 <b>(4 days ago)</b></time>
        </li>
        <li>
            <a href="#">Amet dignissimos optio sit facilis aut quod.</a>
            <time>Due: 2016-12-9 <b>(6 days ago)</b></time>
        </li>
    </ol>

    <div class="hr"></div>

    <h2 class="upcoming">Upcoming Milestones</h2>
    <ol>
        <li>
            <a href="#">Lorem ipsum dolor sit amet</a>
            <time>Due: 2016-12-11</time>
        </li>
        <li class="open">
            <a href="#">Amet dignissimos optio sit facilis aut quod.</a>
            <time>Due: 2016-12-9</time>
            <ul class="tasks">
                <li>
                    <input type="checkbox">
                    <i>Something to do</i>
                    <span>(<a href="#">Alice</a>, <a href="#">Bob</a>)</span>
                </li>
                <li>
                    <input type="checkbox">
                    <i>Another thing to do</i>
                    <span>(<a href="#">Bob</a>)</span>
                </li>
                <li>
                    <input type="checkbox">
                    <i>Yet another thing to do</i>
                    <span>(<a href="#">Alice</a>)</span>
                </li>
                <li class="done">
                    <input type="checkbox" checked>
                    <s>More thing to do</s>
                    <span>(<a href="#">Alice</a>, <a href="#">Bob</a>)</span>
                </li>
            </ul>
            <form action="">
                <input type="text"><button>+</button>
            </form>
        </li>
        <li>
            <a href="#">Lorem ipsum dolor sit amet</a>
            <time>Due: 2016-12-11</time>
        </li>
        <li>
            <a href="#">Amet dignissimos optio sit facilis aut quod.</a>
            <time>Due: 2016-12-9</time>
        </li>
        <li>
            <a href="#">Lorem ipsum dolor sit amet</a>
            <time>Due: 2016-12-11</time>
        </li>
        <li>
            <a href="#">Amet dignissimos optio sit facilis aut quod.</a>
            <time>Due: 2016-12-9</time>
        </li>
    </ol>
</div>

<div class="projects">
    <ul>
        <li class="active">
            <a class="project-title" href="#">Task Manager</a>

            <div class="due">
                <img src="img/due.png" width="16" alt="">
                <time>Due: 2016-12-24 (34 days left)</time>
            </div>

            <div class="meta">
                <img src="img/users.png" width="16" alt="">
                <a href="#">5 members</a>

                <img src="img/milestones.png" width="16" alt="">
                <span>4 milestones</span>
            </div>

            <div class="progress">
                <span class="bar"></span>
                <span class="percent">23 tasks, 45% Done</span>
            </div>
        </li>
        <li>
            <a href="#">Proterty Listing</a>
            <div class="due">
                <img src="img/due.png" width="16" alt="">
                <time>Due: 2016-12-24 (34 days left)</time>
            </div>

            <div class="meta">
                <img src="img/users.png" width="16" alt="">
                <a href="#">5 members</a>

                <img src="img/milestones.png" width="16" alt="">
                <span>4 milestones</span>
            </div>
        </li>
        <li>
            <a href="#">Zend Bookmark</a>
            <div class="due">
                <img src="img/due.png" width="16" alt="">
                <time>Due: 2016-12-24 (34 days left)</time>
            </div>

            <div class="meta">
                <img src="img/users.png" width="16" alt="">
                <a href="#">5 members</a>

                <img src="img/milestones.png" width="16" alt="">
                <span>4 milestones</span>
            </div>
        </li>
    </ul>
</div>
@endsection
