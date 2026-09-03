<x-app-layout>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f8f8f8;
        }

        /* ========================================
           HOME
        ======================================== */

        .pinspace-home {
            padding: 30px 35px 50px;
        }

        /* ========================================
           HEADER
        ======================================== */

        .home-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .home-title {
            margin: 0;
            color: #222;
            font-size: 30px;
            font-weight: 700;
        }

        .home-subtitle {
            margin-top: 6px;
            color: #777;
            font-size: 16px;
        }

        .add-pin {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 13px 20px;
            border-radius: 25px;
            background: #e60023;
            color: white;
            text-decoration: none;
            font-weight: 600;
            white-space: nowrap;
            transition: .2s;
        }

        .add-pin:hover {
            background: #c9001f;
            color: white;
            transform: translateY(-1px);
        }

        /* ========================================
           SUCCESS MESSAGE
        ======================================== */

        .success-message {
            margin-bottom: 25px;
            padding: 13px 18px;
            border-radius: 10px;
            background: #d4edda;
            color: #155724;
        }

        /* ========================================
           PINTEREST GRID
        ======================================== */

        .pins-grid {
            column-count: 5;
            column-gap: 18px;
        }

        .pin-card {
            display: inline-block;
            width: 100%;
            margin-bottom: 20px;

            break-inside: avoid;

            background: white;
            border-radius: 16px;
            overflow: hidden;

            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);

            transition: .2s;
        }

        .pin-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 18px rgba(0, 0, 0, .1);
        }

        /* ========================================
           DELETE PIN
        ======================================== */

        .pin-owner-actions {
            display: flex;
            justify-content: flex-end;
            padding: 8px 10px 0;
        }

        .delete-btn {
            border: none;
            padding: 7px 12px;
            border-radius: 20px;

            background: white;
            color: #e60023;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
            transition: .2s;
        }

        .delete-btn:hover {
            background: #ffe5e9;
        }

        /* ========================================
           MEDIA
        ======================================== */

        .pin-image-container {
            position: relative;
            overflow: hidden;
            background: #eee;
        }

        .pin-image {
            display: block;
            width: 100%;
            height: auto;

            object-fit: cover;

            transition: .25s;
        }

        .pin-card:hover .pin-image {
            transform: scale(1.02);
        }

        .pin-video {
            display: block;
            width: 100%;
            height: auto;
            background: #000;
        }

        .pin-audio {
            padding: 25px 15px;
            background: #f4f4f4;
            text-align: center;
        }

        .pin-audio-icon {
            margin-bottom: 12px;
            font-size: 45px;
        }

        .pin-audio audio {
            width: 100%;
        }

        /* ========================================
           PIN INFO
        ======================================== */

        .pin-info {
            padding: 14px;
        }

        .pin-title {
            color: #222;
            font-size: 16px;
            font-weight: 700;
        }

        .pin-description {
            margin-top: 5px;
            color: #777;
            font-size: 14px;
            line-height: 1.4;
        }

        /* ========================================
           LIKE
        ======================================== */

        .pin-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
        }

        .like-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            border: none;
            padding: 7px 12px;
            border-radius: 20px;

            background: #f7f7f7;
            color: #555;

            font-size: 14px;
            cursor: pointer;

            transition: .2s;
        }

        .like-btn:hover {
            background: #ffe5e9;
            transform: scale(1.03);
        }

        .like-btn.liked {
            background: #ffe5e9;
            color: #e60023;
        }

        .like-count {
            color: #666;
            font-size: 14px;
        }

        /* ========================================
           COMMENTS
        ======================================== */

        .comments-section {
            margin-top: 15px;
            padding-top: 12px;
            border-top: 1px solid #eee;
        }

        .comments-title {
            margin-bottom: 10px;
            color: #333;
            font-size: 14px;
            font-weight: 700;
        }

        .comments-title span {
            color: #888;
            font-weight: 500;
        }

        .comments-list {
            max-height: 180px;
            margin-bottom: 10px;
            overflow-y: auto;
        }

        .comments-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 8px;

            padding: 8px 0;

            border-bottom: 1px solid #f1f1f1;
        }

        .comments-content {
            min-width: 0;
        }

        .comments-content strong {
            color: #222;
            font-size: 13px;
        }

        .comments-content p {
            margin: 2px 0 0;

            color: #666;
            font-size: 13px;
            line-height: 1.4;

            word-break: break-word;
        }

        .delete-comments {
            flex-shrink: 0;

            border: none;
            padding: 0 3px;

            background: transparent;
            color: #aaa;

            font-size: 18px;
            cursor: pointer;
        }

        .delete-comments:hover {
            color: #e60023;
        }

        .no-comments {
            margin: 5px 0 10px;
            color: #999;
            font-size: 13px;
        }

        /* ========================================
           COMMENT FORM
        ======================================== */

        .comments-form {
            display: flex;
            gap: 6px;
            margin-top: 10px;
        }

        .comments-form input {
            flex: 1;
            min-width: 0;

            padding: 8px 12px;

            border: 1px solid #ddd;
            border-radius: 18px;

            outline: none;

            font-size: 13px;
        }

        .comments-form input:focus {
            border-color: #e60023;
        }

        .comments-form button {
            border: none;
            padding: 8px 13px;
            border-radius: 18px;

            background: #e60023;
            color: white;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
            transition: .2s;
        }

        .comments-form button:hover {
            background: #c9001f;
        }

        .login-comments {
            margin-top: 10px;
            color: #888;
            font-size: 12px;
        }

        /* ========================================
           EMPTY STATE
        ======================================== */

        .empty-pin {
            padding: 100px 20px;
            text-align: center;
        }

        .empty-icon {
            margin-bottom: 15px;
            font-size: 60px;
        }

        .empty-pin h2 {
            margin-bottom: 8px;
            font-size: 24px;
        }

        .empty-pin p {
            margin-bottom: 25px;
            color: #777;
        }

        /* ========================================
        SEARCH
        ======================================== */

        .search-form {
            display: flex;
            align-items: center;
            width: 350px;
        }

        .search-input {
            flex: 1;
            padding: 12px 18px;

            border: 1px solid #ddd;
            border-right: none;
            border-radius: 25px 0 0 25px;

            outline: none;
            background: white;

            font-size: 14px;
        }

        .search-input:focus {
            border-color: #e60023;
        }

        .search-btn {
            padding: 12px 17px;

            border: none;
            border-radius: 0 25px 25px 0;

            background: #e60023;
            color: white;

            font-size: 16px;
            cursor: pointer;

            transition: .2s;
        }

        .search-btn:hover {
            background: #c9001f;
        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 1200px) {
            .pins-grid {
                column-count: 4;
            }
        }

        @media (max-width: 900px) {
            .pins-grid {
                column-count: 3;
            }
        }

        @media (max-width: 650px) {
            .pinspace-home {
                padding: 20px;
            }

            .home-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .home-title {
                font-size: 24px;
            }

            .add-pin {
                padding: 10px 15px;
            }

            .pins-grid {
                column-count: 2;
            }

            .search-form {
                width: 100%;
                max-width: none;
            }
        }

        @media (max-width: 450px) {
            .pins-grid {
                column-count: 1;
            }
        }


    </style>


        <div class="pinspace-home">

            {{-- ========================================
                HEADER
            ======================================== --}}

            <div class="home-top">

        {{-- JUDUL --}}
        <div>
            <h1 class="home-title">
                Inspirasi Hari Ini 📌
            </h1>

            <p class="home-subtitle">
                Temukan dan simpan inspirasi favoritmu.
            </p>
        </div>


        {{-- SEARCH --}}
        <form
            action="{{ route('home') }}"
            method="GET"
            class="search-form"
        >
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari pin..."
                class="search-input"
            >

            <button
                type="submit"
                class="search-btn"
            >
                🔍
            </button>
        </form>


        {{-- TAMBAH PIN --}}
        <a
            href="{{ route('pins.create') }}"
            class="add-pin"
        >
            <span style="font-size: 20px;">+</span>
            Tambahkan Pin
        </a>

    </div>


            {{-- ========================================
                SUCCESS MESSAGE
            ======================================== --}}

            @if(session('success'))

                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>

            @endif


        {{-- ========================================
             PIN LIST
        ======================================== --}}

        @if($pins->count() > 0)

            <div class="pins-grid">

                @foreach($pins as $pin)

                    <div class="pin-card">

                        {{-- ========================================
                             DELETE PIN
                        ======================================== --}}

                        @auth

                            @if($pin->user_id === Auth::id())

                                <div class="pin-owner-actions">

                                    <form
                                        action="{{ route('pins.destroy', $pin) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pin ini?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn"
                                        >
                                            🗑️ Hapus
                                        </button>

                                    </form>

                                </div>

                            @endif

                        @endauth


                        {{-- ========================================
                             MEDIA
                        ======================================== --}}

                        <div class="pin-image-container">

                            @if($pin->media_type === 'image')

                                <img
                                    src="{{ asset('storage/' . $pin->media) }}"
                                    alt="{{ $pin->title }}"
                                    class="pin-image"
                                >

                            @elseif($pin->media_type === 'video')

                                <video
                                    src="{{ asset('storage/' . $pin->media) }}"
                                    class="pin-video"
                                    controls
                                ></video>

                            @elseif($pin->media_type === 'audio')

                                <div class="pin-audio">

                                    <div class="pin-audio-icon">
                                        🎵
                                    </div>

                                    <audio
                                        src="{{ asset('storage/' . $pin->media) }}"
                                        controls
                                    ></audio>

                                </div>

                            @endif

                        </div>


                        {{-- ========================================
                             PIN INFORMATION
                        ======================================== --}}

                        <div class="pin-info">

                            {{-- TITLE --}}

                            <div class="pin-title">
                                {{ $pin->title }}
                            </div>


                            {{-- DESCRIPTION --}}

                            @if($pin->description)

                                <div class="pin-description">
                                    {{ $pin->description }}
                                </div>

                            @endif


                            {{-- ========================================
                                 LIKE
                            ======================================== --}}

                            <div class="pin-actions">

                                @auth

                                    @php
                                        $userLiked = $pin->likes()
                                            ->where('user_id', Auth::id())
                                            ->exists();

                                        $likeCount = $pin->likes()->count();
                                    @endphp

                                    <form
                                        action="{{ route('pins.like', $pin->id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="like-btn {{ $userLiked ? 'liked' : '' }}"
                                        >

                                            {{ $userLiked ? '❤️' : '🤍' }}

                                            <span>
                                                {{ $likeCount }}
                                            </span>

                                        </button>

                                    </form>

                                @else

                                    <div class="like-count">
                                        🤍 {{ $pin->likes()->count() }}
                                    </div>

                                @endauth

                            </div>


                            {{-- ========================================
                                 COMMENTS
                            ======================================== --}}

                            <div class="comments-section">

                                <div class="comments-title">

                                    💬 Komentar

                                    <span>
                                        {{ $pin->comments()->count() }}
                                    </span>

                                </div>


                                {{-- COMMENT LIST --}}

                                @if($pin->comments()->count() > 0)

                                    <div class="comments-list">

                                        @foreach($pin->comments()->latest()->get() as $comments)

                                            <div class="comments-item">

                                                <div class="comments-content">

                                                    <strong>
                                                        {{ $comments->user->name }}
                                                    </strong>

                                                    <p>
                                                        {{ $comments->comments }}
                                                    </p>

                                                </div>


                                                {{-- DELETE COMMENT --}}

                                                @auth

                                                    @if($comments->user_id === Auth::id())

                                                        <form
                                                            action="{{ route('comments.destroy', $comments->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Hapus komentar ini?');"
                                                        >

                                                            @csrf
                                                            @method('DELETE')

                                                            <button
                                                                type="submit"
                                                                class="delete-comment"
                                                                title="Hapus komentar"
                                                            >
                                                                ×
                                                            </button>

                                                        </form>

                                                    @endif

                                                @endauth

                                            </div>

                                        @endforeach

                                    </div>

                                @else

                                    <p class="no-comment">
                                        Belum ada komentar.
                                    </p>

                                @endif


                                {{-- ========================================
                                     COMMENT FORM
                                ======================================== --}}

                                @auth

                                    <form
                                        action="{{ route('comments.store', $pin->id) }}"
                                        method="POST"
                                        class="comments-form"
                                    >

                                        @csrf

                                        <input
                                            type="text"
                                            name="comments"
                                            placeholder="Tambahkan komentar..."
                                            maxlength="500"
                                            required
                                        >

                                        <button type="submit">
                                            Kirim
                                        </button>

                                    </form>

                                @else

                                    <p class="login-comments">
                                        <a href="{{ route('login') }}" style="color: #e60023; font-weight: 600; text-decoration: none;">Masuk</a> untuk menambahkan komentar.
                                    </p>

                                @endauth

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


        {{-- ========================================
             EMPTY STATE
        ======================================== --}}

        @else

            <div class="empty-pin">

                <div class="empty-icon">
                    📌
                </div>

                <h2>
                    Belum ada Pin
                </h2>

                <p>
                    Yuk buat pin pertamamu dan mulai kumpulkan inspirasimu.
                </p>

            </div>

        @endif

    </div>

</x-app-layout>