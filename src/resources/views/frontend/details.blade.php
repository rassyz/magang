@extends('frontend.master')
@section('content')

<body class="font-[Poppins]">
	<x-navbar />
    <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px] flex-wrap">

        @foreach($categories as $item_category)
            <a href="{{ route('front.category', $item_category->slug) }}" class="rounded-full p-[8px_16px] flex gap-[8px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] mb-0 sm:mb-0">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="{{ Storage::url($item_category->icon) }}" alt="icon" />
                </div>
                <span class="text-xs sm:text-sm">{{ $item_category->name }}</span>
            </a>
        @endforeach

    </nav>
	<header class="flex flex-col items-center gap-[50px] mt-[70px] px-4">

        <!-- Headline Section -->
        <div id="Headline" class="max-w-[1130px] mx-auto flex flex-col gap-4 items-center">
            <p class="w-fit text-[#A3A6AE]">{{ $articleNews->created_at->format('d M Y, H:i') }} • {{ $articleNews->category->name }}</p>
            <h1 id="Title" class="font-bold text-[36px] leading-[48px] sm:text-[46px] sm:leading-[60px] text-center two-lines">
                {{ $articleNews->name }}
            </h1>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-5 sm:gap-[70px]">
                <!-- Author Section -->
                <a id="Author" href="{{ route('front.author', $articleNews->author->slug) }}" class="w-fit h-fit">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img src="{{ Storage::url($articleNews->author->avatar) }}" class="object-cover w-full h-full" alt="avatar">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-sm leading-[21px]">{{ $articleNews->author->name }}</p>
                            <p class="text-xs leading-[18px] text-[#A3A6AE]">{{ $articleNews->author->occupation }}</p>
                        </div>
                    </div>
                </a>

                <!-- Rating Section -->
                <div id="Rating" class="flex items-center gap-1">
                    <div class="flex items-center">
                        <div class="w-4 h-4 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                        </div>
                        <div class="w-4 h-4 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                        </div>
                        <div class="w-4 h-4 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                        </div>
                        <div class="w-4 h-4 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                        </div>
                        <div class="w-4 h-4 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                        </div>
                    </div>
                    <p class="font-semibold text-xs leading-[18px]">(12,490)</p>
                </div>
            </div>
        </div>

        <!-- Article Thumbnail Section -->
        <div class="w-full h-[300px] sm:h-[500px] flex shrink-0 overflow-hidden">
            <img src="{{ Storage::url($articleNews->thumbnail) }}" class="object-cover w-full h-full" alt="cover thumbnail">
        </div>

    </header>

	<section id="Article-container" class="max-w-[1130px] mx-auto flex flex-col sm:flex-row gap-10 mt-[50px] px-4">

        <!-- Article Content -->
        <article id="Content-wrapper" class="flex-1">
            {!! $articleNews->content !!}
        </article>

        <!-- Sidebar Section -->
        <div class="side-bar flex flex-col w-full sm:w-[300px] gap-10">

            <!-- Advertisement 1 -->
            <div class="ads flex flex-col gap-3 w-full">
                <a href="{{ $squareads_1->link }}">
                    <img src="{{ Storage::url($squareads_1->thumbnail) }}" class="object-contain w-full h-full" alt="ads" />
                </a>
                <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                    Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img src="{{ asset('assets/images/icons/message-question.svg') }}" alt="icon" /></a>
                </p>
            </div>

            <!-- More From Author Section -->
            <div id="More-from-author" class="flex flex-col gap-4">
                <p class="font-bold">More From Author</p>
                @forelse($author_news as $item_news)
                    <a href="{{ route('front.details', $item_news->slug) }}" class="card-from-author">
                        <div class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                            <div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
                                <img src="{{ Storage::url($item_news->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[6px]">
                                <p class="line-clamp-2 font-bold">{{ $item_news->name }}</p>
                                <p class="text-xs leading-[18px] text-[#A3A6AE]">{{ $item_news->created_at->format('d M Y, H:i') }} • {{ $item_news->category->name }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>No articles found</p>
                @endforelse
            </div>

            <!-- Advertisement 2 -->
            <div class="ads flex flex-col gap-3 w-full">
                <a href="{{ $squareads_2->link }}">
                    <img src="{{ Storage::url($squareads_2->thumbnail) }}" class="object-contain w-full h-full" alt="ads" />
                </a>
                <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                    Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img src="{{ asset('assets/images/icons/message-question.svg') }}" alt="icon" /></a>
                </p>
            </div>

        </div>

    </section>

	<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px] px-4">

        <div class="flex flex-col gap-3 w-full sm:w-fit">
            <a href="{{ $bannerads->link }}">
                <div class="w-full sm:w-[900px] h-[120px] flex rounded-2xl overflow-hidden border border-[#EEF0F7]">
                    <img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
                </div>
            </a>
            <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1 text-center sm:text-left">
                Our Advertisement
                <a href="#" class="w-[18px] h-[18px]">
                    <img src="{{ asset('assets/images/icons/message-question.svg') }}" alt="icon" />
                </a>
            </p>
        </div>

    </section>

    {{-- comment --}}
    <section class="bg-[#F9F9FC] mt-[50px] py-8">
        <div class="container mx-auto px-4 max-w-[1130px]">
          <h2 class="text-2xl font-bold mb-4">Comments</h2>

          <div class="space-y-4">

                @forelse($articleNews->comments as $comment)
                    <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('assets/images/photos/avatar.png') }}" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                        <div>
                        <h3 class="font-semibold">{{ $comment->name }}</h3>
                        <p class="text-sm text-gray-500">Posted on {{ $comment->created_at->format('H:i, d M Y') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700">
                        {{ $comment->review }}
                    </p>
                    <div class="flex items-center mt-2">
                        <button class="text-blue-500 hover:text-blue-600 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        Like
                        </button>
                        <button class="text-gray-500 hover:text-gray-600">Reply</button>
                    </div>
                    </div>
                @empty
                    <p>No comments yet.</p>
                @endforelse

          </div>

          <!-- Add Comment Form -->
          <form action="{{ route('front.comment', $articleNews->id) }}" method="POST" class="mt-8 bg-white p-4 rounded-lg shadow">
            @csrf
            <h3 class="text-lg font-semibold mb-2">Add a Comment</h3>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 font-medium mb-2">Comment</label>
                <textarea id="comment" name="comment" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Post Comment
            </button>
        </form>

        </div>
    </section>

	<section id="Up-to-date" class="w-full flex justify-center py-[50px] bg-[#F9F9FC]">
		<div class="max-w-[1130px] mx-auto flex flex-col gap-[30px]">
			<div class="ml-4 sm:ml-0 flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Other News You <br />
					Might Be Interested
				</h2>
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-[30px]">

                @forelse($articles as $article)
                    <a href="{{ route('front.details', $article->slug) }}" class="card-news">
                        <div class="mx-4 sm:mx-0 rounded-[20px] ring-1 ring-[#EEF0F7] p-[20px] sm:p-[26px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                            <div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                                <p class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
                                    SPORT
                                </p>
                                <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail" />
                            </div>
                            <div class="card-info flex flex-col gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">
                                    {{ substr($article->name, 0, 50) }}{{ strlen($article->name) > 50 ? '...' : '' }}
                                </h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                    {{ $article->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Article not Found</p>
                @endforelse

            </div>

		</div>
	</section>


</body>

@endsection

@push('after-style')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
@endpush

@push('after-script')
    <script src="{{ asset('assets/js/two-lines-text.js') }}"></script>
@endpush
