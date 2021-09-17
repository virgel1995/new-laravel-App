<div class="card">

    <div class="card-body">

        @error('title')
        <div class="alert alert-error">
            <div class="flex-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="w-6 h-6 mx-2 stroke-current"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
                    ></path>
                </svg>
                <label>{{ $message }}</label>
            </div>
        </div>
        @enderror @error('content')
        <div class="alert alert-error">
            <div class="flex-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="w-6 h-6 mx-2 stroke-current"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
                    ></path>
                </svg>
                <label>{{ $message }}</label>
            </div>
        </div>
        @enderror

        <form
            method="post"
            action="{{ route('post.store') }}"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="p-10 card bg-gray-400">
                <h5 class="text-center py-1 rounded-3xl bg-blue-100">New Post</h5>
                <div class="form-control">
                    <input
                        type="text"
                        name="title"
                        placeholder="Title"
                        class="input rounded-3xl my-2"
                        required
                    />
                    <textarea
                        name="content"
                        class="textarea h-24 rounded-3xl my-1"
                        placeholder="Content "
                        required
                    ></textarea>

                    <div class="flex">
                        <label class="divstudent px-1">
                            <input
                                type="file"
                                hidden
                                name="image"
                                class="h-24 profile-img"
                                id="profile-img"
                            />
                            <img
                                src="https://icon-library.com/images/upload-cloud-icon/upload-cloud-icon-16.jpg"
                                id="profile-img-tag"
                                class="
                                    h-24 w-24 rounded border border-pink-300 cursor-pointer
                                    bg-blue-100 hover:bg-pink-900
                                "
                                alt=""
                            />
                        </label>

                        <div class="form-group py-1">
                            <input
                                type="submit"
                                class="btn btn-success"
                                value="Create post"
                            />
                        </div>
                 </div>
            </div>
            </div>
        </form>
    </div>
</div>
