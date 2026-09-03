<x-app-layout>

    <style>
        .create-page {
            max-width: 950px;
            margin: 35px auto;
            padding: 20px;
        }

        .create-title {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .create-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
        }

        .upload-area {
            border: 2px dashed #ccc;
            border-radius: 18px;
            padding: 55px 20px;
            text-align: center;
            cursor: pointer;
            display: block;
            transition: .2s;
        }

        .upload-area:hover {
            border-color: #e60023;
            background: #fff8f9;
        }

        .upload-icon {
            font-size: 55px;
            margin-bottom: 12px;
        }

        .upload-title {
            font-size: 20px;
            font-weight: 600;
        }

        .upload-text {
            color: #777;
            margin-top: 7px;
        }

        #media {
            display: none;
        }

        .preview {
            margin-top: 20px;
            display: none;
        }

        .preview img,
        .preview video {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            border-radius: 15px;
            background: #eee;
        }

        .audio-preview {
            background: #f5f5f5;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
        }

        .audio-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .audio-preview audio {
            width: 100%;
        }

        .form-group {
            margin-top: 22px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
        }

        textarea.form-input {
            min-height: 120px;
            resize: vertical;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .back-btn {
            color: #555;
            text-decoration: none;
        }

        .save-btn {
            border: none;
            background: #e60023;
            color: white;
            padding: 13px 27px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
        }

        .save-btn:hover {
            background: #c9001f;
        }

        .error-box {
            background: #f8d7da;
            color: #721c24;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>


    <div class="create-page">

        <h1 class="create-title">
            Buat Pin 📌
        </h1>


        {{-- ERROR VALIDASI --}}
        @if($errors->any())

            <div class="error-box">

                <strong>Gagal membuat Pin:</strong>

                <ul style="margin-top:8px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <div class="create-card">

            <form
                action="{{ route('pins.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- UPLOAD MEDIA --}}
                <label for="media" class="upload-area">

                    <div class="upload-icon">
                        🖼️ 🎬 🎵
                    </div>

                    <div class="upload-title">
                        Pilih foto, video, atau audio
                    </div>

                    <div class="upload-text">
                        Klik di sini untuk memilih file dari komputer
                    </div>

                </label>


                <input
                    type="file"
                    name="media"
                    id="media"
                    accept="image/*,video/*,audio/*"
                    required
                >


                {{-- PREVIEW --}}
                <div
                    class="preview"
                    id="preview"
                >

                    {{-- FOTO --}}
                    <img
                        id="previewImage"
                        style="display:none;"
                    >


                    {{-- VIDEO --}}
                    <video
                        id="previewVideo"
                        controls
                        style="display:none;"
                    ></video>


                    {{-- AUDIO --}}
                    <div
                        id="audioPreview"
                        class="audio-preview"
                        style="display:none;"
                    >

                        <div class="audio-icon">
                            🎵
                        </div>

                        <p style="margin-bottom:15px; font-weight:600;">
                            Preview Audio
                        </p>

                        <audio
                            id="previewAudio"
                            controls
                        ></audio>

                    </div>

                </div>


                {{-- JUDUL --}}
                <div class="form-group">

                    <label
                        for="title"
                        class="form-label"
                    >
                        Judul Pin
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-input"
                        placeholder="Contoh: Inspirasi Kamar"
                        value="{{ old('title') }}"
                        required
                    >

                </div>


                {{-- DESKRIPSI --}}
                <div class="form-group">

                    <label
                        for="description"
                        class="form-label"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-input"
                        placeholder="Ceritakan tentang pin ini..."
                    >{{ old('description') }}</textarea>

                </div>


                {{-- BUTTON --}}
                <div class="button-row">

                    <a
                        href="{{ route('home') }}"
                        class="back-btn"
                    >
                        ← Kembali
                    </a>

                    <button
                        type="submit"
                        class="save-btn"
                    >
                        Simpan Pin 📌
                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- PREVIEW JAVASCRIPT --}}
    <script>

        const mediaInput =
            document.getElementById('media');

        const preview =
            document.getElementById('preview');

        const previewImage =
            document.getElementById('previewImage');

        const previewVideo =
            document.getElementById('previewVideo');

        const audioPreview =
            document.getElementById('audioPreview');

        const previewAudio =
            document.getElementById('previewAudio');


        mediaInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                preview.style.display = 'none';
                return;
            }


            const url = URL.createObjectURL(file);

            preview.style.display = 'block';


            // Reset semua preview
            previewImage.style.display = 'none';
            previewVideo.style.display = 'none';
            audioPreview.style.display = 'none';


            // FOTO
            if (file.type.startsWith('image/')) {

                previewImage.src = url;
                previewImage.style.display = 'block';

            }


            // VIDEO
            else if (file.type.startsWith('video/')) {

                previewVideo.src = url;
                previewVideo.style.display = 'block';

            }


            // AUDIO
            else if (file.type.startsWith('audio/')) {

                previewAudio.src = url;
                audioPreview.style.display = 'block';

            }

        });

    </script>

</x-app-layout>