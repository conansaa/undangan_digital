@extends('admin.layout.template')

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')
<style>
    .theme-option {
        transition: all 0.3s;
        border: 2px solid transparent;
    }

    .theme-option.selected {
        border-color: #ffc107; /* border kuning */
        box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hasEvent = @json($hasEvent); // dapet dari controller

        let sidebar = document.getElementById("sidenav-main");
        if (sidebar) {
            sidebar.style.display = "block";

            if (!hasEvent) {
                // Nonaktifkan semua link
                let links = sidebar.querySelectorAll("a");
                links.forEach(link => {
                    link.style.pointerEvents = "none";
                    link.style.opacity = "0.5";
                    link.style.cursor = "not-allowed";
                });
            }
        }
    });
</script>

<div class="container mt-5">
    <a href="{{ route('check.event') }}" class="btn btn-sm btn-outline-danger fw-bold me-2 mb-4">Kembali</a>
    <div class="card shadow p-4">
        <h3 class="text-center text-warning">Buat Acara Barumu! 🎉</h3>
        <div id="eventWizard">
            <!-- Step 1: Informasi Acara -->
            <div class="step active">
                <div class="mx-auto" style="max-width: 500px;">
                    <h5 class="text-center">Informasi Acara</h5>
                    <input type="text" id="event_name" class="form-control mt-2" placeholder="Coba spill nama acara kamu yang keren itu!" required>
                    <input type="date" id="event_date" class="form-control mt-2" placeholder="Tanggal berapa nih acara kamu diadakan?" required>
                    <input type="time" id="event_time" class="form-control mt-2" placeholder="Jam berapa nih acaranya mulai?" required>
                    <select id="type" class="form-control">
                        <option value="">Tipe acara kamu apa?</option>
                        @foreach($type as $type)
                            <option value="{{ $type->id }}">{{ $type->nama }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="event_location" class="form-control mt-2" placeholder="Dimana nih kamu adain acaranya?" required>
                    <button class="btn btn-warning mt-3" onclick="validateStep1()">Lanjut</button>
                </div>
            </div>

            <!-- Step 2: Pilih Tema -->
            {{-- <div class="step d-none">
                <div class="mx-auto" style="max-width: 500px;">
                    <h5 class="text-center">Pilih Tema</h5>
                    <select id="theme_id" class="form-control">
                        <option value="" data-preview="">Pilih Tema Undangan Kamu Yuk!</option>
                        @foreach($theme as $t)
                            <option value="{{ $t->id }}" data-preview="{{ $t->preview_url }}">
                                {{ $t->name }}
                            </option>
                        @endforeach
                    </select>
                    
                    <!-- Tombol untuk melihat preview -->
                    <a id="previewButton" href="#" target="_blank" class="btn btn-info mt-3 d-none">Lihat Preview</a>                

                    <button class="btn btn-secondary mt-3 prev-step">Kembali</button>
                    <button class="btn btn-warning mt-3 next-step" onclick="validateStep2()">Lanjut</button>
                </div>
            </div> --}}
            <div class="step d-none">
                <div class="mx-auto" style="max-width: 700px;">
                    <h5 class="text-center mb-3">Pilih Tema</h5>
                    <div class="row">
                        @foreach ($theme as $t)
                            {{-- <div class="text-center mt-3">
                                <a href="#" id="previewButton" target="_blank" class="btn btn-info d-none">Preview Tema</a>
                            </div> --}}
                        
                            <div class="col-md-4 mb-3">
                                <div class="theme-option card border p-2 text-center h-100 cursor-pointer" data-id="{{ $t->id }}">
                                    <input type="radio" name="theme_id" id="theme_{{ $t->id }}" value="{{ $t->id }}" class="d-none" data-name="{{ $t->name }}" data-preview="{{ $t->preview_url }}">
                                    <img src="{{ asset('themes/' . $t->preview_image) }}" alt="Preview {{ $t->name }}" class="img-fluid rounded">
                                    <label for="theme_{{ $t->id }}" class="mt-2 d-block">{{ $t->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center">
                        <a href="#" id="previewButton" target="_blank" class="btn btn-info d-none mt-3">Preview Tema</a>
                        <button class="btn btn-secondary mt-3 prev-step">Kembali</button>
                        <button class="btn btn-warning mt-3" onclick="validateStep2()">Lanjut</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Data</h5>
        <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
            <table class="table table-borderless align-middle small w-auto">
                <tbody>
                    <tr>
                        <td ><strong>Nama Acara</strong></td>
                        <td>:</td>
                        <td><span id="confirm_event_name"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal</strong></td>
                        <td>:</td>
                        <td><span id="confirm_event_date"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Waktu</strong></td>
                        <td>:</td>
                        <td><span id="confirm_event_time"></span></td>
                    </tr>
                    <tr>
                        <td ><strong>Tipe Acara</strong></td>
                        <td>:</td>
                        <td><span id="confirm_type"></span></td>
                    </tr>
                    <tr>
                        <td ><strong>Lokasi</strong></td>
                        <td>:</td>
                        <td><span id="confirm_event_location"></span></td>
                        {{-- konfirmasi di create event dalam bentuk modal, ada dua pilihan, satu buat liat data lagi, satu buat save data. --}}
                    </tr>
                    <tr>
                        <td><strong>Tema</strong></td>
                        <td>:</td>
                        <td><span id="confirm_theme"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary prev-step" data-bs-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-success" id="submitEvent">Simpan</button>
        </div>
    </div>
    </div>
</div> 
@endsection

@section('footjs')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const storeEventUrl = "{{ route('store.event') }}";

    let currentStep = 0;
    const steps = document.querySelectorAll(".step");

    function showStep(index) {
            steps.forEach((step, i) => {
                step.classList.toggle("d-none", i !== index);
                step.classList.toggle("active", i === index);
            });
            // steps.forEach((step, i) => {
            //     step.style.display = i === index ? "block" : "none"; // Hanya tampilkan step yang aktif
            // });

            // Jika masuk ke Step Konfirmasi, update data
            if (index === 2) { 
                document.getElementById("confirm_event_name").textContent = document.getElementById("event_name").value;
                document.getElementById("confirm_event_date").textContent = document.getElementById("event_date").value;
                document.getElementById("confirm_event_time").textContent = document.getElementById("event_time").value;
                document.getElementById("confirm_type").textContent = document.getElementById("type").options[document.getElementById("type").selectedIndex].text;
                document.getElementById("confirm_event_location").textContent = document.getElementById("event_location").value;
                // document.getElementById("confirm_theme").textContent = document.getElementById("theme_id").options[document.getElementById("theme_id").selectedIndex].text;

                const selectedTheme = document.querySelector('input[name="theme_id"]:checked');
                if (selectedTheme) {
                    document.getElementById("confirm_theme").textContent = selectedTheme.dataset.name;
                }
            }
        }

    function validateStep1() {
        let eventName = document.getElementById("event_name").value.trim();
        let eventDate = document.getElementById("event_date").value;
        let eventTime = document.getElementById("event_time").value.trim();
        let eventtype = document.getElementById("type").value;
        let eventLocation = document.getElementById("event_location").value.trim();

        if (eventName === "" || eventDate === "" || eventLocation === "" || eventTime === "" || eventtype === "") {
            Swal.fire("Oops!", "Harap isi semua data sebelum lanjut.", "warning");
            return;
        }
        currentStep = 1;
        showStep(currentStep);
    }

        function validateStep2() {
            // let theme = document.getElementById("theme_id").value;

            // if (theme === "") {
            //     Swal.fire("Oops!", "Silakan pilih tema sebelum lanjut.", "warning");
            //     return;
            // }
            let selectedTheme = document.querySelector('input[name="theme_id"]:checked');
            if (!selectedTheme) {
                Swal.fire("Oops!", "Silakan pilih tema sebelum lanjut.", "warning");
                return;
            }

            // Tampilkan data yang diinput di step 3
            document.getElementById("confirm_event_name").textContent = document.getElementById("event_name").value;
            document.getElementById("confirm_event_date").textContent = document.getElementById("event_date").value;
            document.getElementById("confirm_event_time").textContent = document.getElementById("event_time").value;
            document.getElementById("confirm_type").textContent = document.querySelector("#type option:checked").textContent;
            document.getElementById("confirm_event_location").textContent = document.getElementById("event_location").value;
            // document.getElementById("confirm_theme").textContent = document.querySelector("#theme_id option:checked").textContent;
            document.getElementById("confirm_theme").textContent = selectedTheme.dataset.name;

            // currentStep++;
            // showStep(currentStep);
            // Tampilkan modal konfirmasi
            const modal = new bootstrap.Modal(document.getElementById("confirmationModal"));
            modal.show();
        }

    document.addEventListener("DOMContentLoaded", function () {
        // let currentStep = 0;
        // const steps = document.querySelectorAll(".step");

        

        

        // document.getElementById("theme_id").addEventListener("change", function () {
        //     var selectedOption = this.options[this.selectedIndex];
        //     var previewUrl = selectedOption.getAttribute("data-preview");
        //     var previewButton = document.getElementById("previewButton");

        //     if (previewUrl) {
        //         previewButton.href = previewUrl;
        //         previewButton.classList.remove("d-none"); // Tampilkan tombol
        //     } else {
        //         previewButton.classList.add("d-none"); // Sembunyikan jika tidak ada preview
        //     }
        // });
        // document.querySelectorAll('input[name="theme_id"]').forEach(radio => {
        //     radio.addEventListener("change", function () {
        //         const previewUrl = this.getAttribute("data-preview");
        //         const previewButton = document.getElementById("previewButton");

        //         if (previewUrl) {
        //             previewButton.href = previewUrl;
        //             previewButton.classList.remove("d-none");
        //         } else {
        //             previewButton.classList.add("d-none");
        //         }
        //     });
        // });
        // document.querySelectorAll(".theme-option").forEach(option => {
        //     option.addEventListener("click", function () {
        //         // Unselect semua
        //         document.querySelectorAll(".theme-option").forEach(opt => opt.classList.remove("selected"));

        //         // Select yang diklik
        //         this.classList.add("selected");

        //         // Pilih radio button yang terkait
        //         const radio = this.querySelector("input[type='radio']");
        //         if (radio) {
        //             radio.checked = true;
        //         }
        //     });
        // });
        document.querySelectorAll(".theme-option").forEach(option => {
            option.addEventListener("click", function () {
                document.querySelectorAll(".theme-option").forEach(opt => opt.classList.remove("selected"));
                this.classList.add("selected");

                const radio = this.querySelector("input[type='radio']");
                if (radio) {
                    radio.checked = true;

                    const previewUrl = radio.getAttribute("data-preview");
                    const previewButton = document.getElementById("previewButton");

                    if (previewUrl) {
                        previewButton.href = previewUrl;
                        previewButton.classList.remove("d-none");
                    }
                }
            });
        });


        // document.querySelectorAll(".next-step").forEach((button, index) => {
        //     button.addEventListener("click", function () {
        //         if (index === 0 && !validateStep1()) return; // Validasi hanya untuk Step 1
        //         currentStep++;
        //         showStep(currentStep);
        //     });
        // });

        document.querySelectorAll(".prev-step").forEach(button => {
            button.addEventListener("click", function () {
                currentStep--;
                showStep(currentStep);
            });
        });

        document.getElementById("submitEvent").addEventListener("click", function () {
            let selectedTheme = document.querySelector('input[name="theme_id"]:checked');
            if (!selectedTheme) {
                Swal.fire("Oops!", "Silakan pilih tema sebelum menyimpan.", "warning");
                return;
            }

            let formData = {
                event_name: document.getElementById("event_name").value,
                event_date: document.getElementById("event_date").value,
                event_time: document.getElementById("event_time").value,
                type: document.getElementById("type").value,
                event_location: document.getElementById("event_location").value,
                // theme_id: document.getElementById("theme_id").value
                theme_id: selectedTheme.value
            };

            fetch(storeEventUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire("Berhasil!", "Event berhasil dibuat! Silahkan melanjutkan pengisian data undangan ya!", "success")
                    .then(() => {
                        window.location.href = "/manage-event";
                    });
                } else {
                    Swal.fire("Gagal!", data.message, "error");
                }
            })
            .catch(error => {
                Swal.fire("Error!", "Terjadi kesalahan, coba lagi.", "error");
                console.error(error);
            });
        });

        showStep(currentStep);
    });
</script>
@endsection
