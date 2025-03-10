@extends('admin.layout.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center text-warning">Buat Acara Barumu! 🎉</h3>
        <div id="eventWizard">
            <!-- Step 1: Informasi Acara -->
            <div class="step active">
                <h5>Informasi Acara</h5>
                <input type="text" id="event_name" class="form-control mt-2" placeholder="Coba spill nama acara kamu yang keren itu!" required>
                <input type="date" id="event_date" class="form-control mt-2" placeholder="Tanggal berapa nih acara kamu diadakan?" required>
                <input type="text" id="event_time" class="form-control mt-2" placeholder="Jam berapa nih acaranya mulai?" required>
                <select id="type" class="form-control">
                    <option value="">Tipe acara kamu apa?</option>
                    @foreach($type as $type)
                        <option value="{{ $type->id }}">{{ $type->nama }}</option>
                    @endforeach
                </select>
                <input type="text" id="event_location" class="form-control mt-2" placeholder="Dimana nih kamu adain acaranya?" required>
                <button class="btn btn-warning mt-3 next-step" onclick="validateStep1()">Lanjut</button>
            </div>

            <!-- Step 2: Pilih Tema -->
            <div class="step d-none">
                <h5>Pilih Tema</h5>
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

            <!-- Step 3: Konfirmasi -->
            <div class="step">
                <h5>Konfirmasi Data</h5>
                <p><strong>Nama Acara:</strong> <span id="confirm_event_name"></span></p>
                <p><strong>Tanggal:</strong> <span id="confirm_event_date"></span></p>
                <p><strong>Waktu:</strong> <span id="confirm_event_time"></span></p>
                <p><strong>Tipe Acara:</strong> <span id="confirm_type"></span></p>
                <p><strong>Lokasi:</strong> <span id="confirm_event_location"></span></p>
                <p><strong>Tema:</strong> <span id="confirm_theme"></span></p>
                <button class="btn btn-secondary mt-3 prev-step">Kembali</button>
                <button class="btn btn-success mt-3" id="submitEvent">Simpan</button>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footjs')
<script>
    const storeEventUrl = "{{ route('store.event') }}";

    document.addEventListener("DOMContentLoaded", function () {
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
                document.getElementById("confirm_theme").textContent = document.getElementById("theme_id").options[document.getElementById("theme_id").selectedIndex].text;
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
            currentStep++;
            showStep(currentStep);
        }

        function validateStep2() {
            let theme = document.getElementById("theme_id").value;

            if (theme === "") {
                Swal.fire("Oops!", "Silakan pilih tema sebelum lanjut.", "warning");
                return;
            }

            // Tampilkan data yang diinput di step 3
            document.getElementById("confirm_event_name").textContent = document.getElementById("event_name").value;
            document.getElementById("confirm_event_date").textContent = document.getElementById("event_date").value;
            document.getElementById("confirm_event_time").textContent = document.getElementById("event_time").value;
            document.getElementById("confirm_type").textContent = document.querySelector("#type option:checked").textContent;
            document.getElementById("confirm_event_location").textContent = document.getElementById("event_location").value;
            document.getElementById("confirm_theme").textContent = document.querySelector("#theme_id option:checked").textContent;

            currentStep++;
            showStep(currentStep);
        }

        document.getElementById("theme_id").addEventListener("change", function () {
            var selectedOption = this.options[this.selectedIndex];
            var previewUrl = selectedOption.getAttribute("data-preview");
            var previewButton = document.getElementById("previewButton");

            if (previewUrl) {
                previewButton.href = previewUrl;
                previewButton.classList.remove("d-none"); // Tampilkan tombol
            } else {
                previewButton.classList.add("d-none"); // Sembunyikan jika tidak ada preview
            }
        });


        document.querySelectorAll(".next-step").forEach((button, index) => {
            button.addEventListener("click", function () {
                if (index === 0 && !validateStep1()) return; // Validasi hanya untuk Step 1
                currentStep++;
                showStep(currentStep);
            });
        });

        document.querySelectorAll(".prev-step").forEach(button => {
            button.addEventListener("click", function () {
                currentStep--;
                showStep(currentStep);
            });
        });

        document.getElementById("submitEvent").addEventListener("click", function () {
            let formData = {
                event_name: document.getElementById("event_name").value,
                event_date: document.getElementById("event_date").value,
                event_time: document.getElementById("event_time").value,
                type: document.getElementById("type").value,
                event_location: document.getElementById("event_location").value,
                theme_id: document.getElementById("theme_id").value
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
                    Swal.fire("Berhasil!", "Event berhasil dibuat!", "success")
                    .then(() => {
                        window.location.href = "/client";
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
