<style>
  form#userEditForm {
    max-width: 100%;
    width:100px ;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 600px;
  }

  form#userEditForm label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
  }

  form#userEditForm input,
  form#userEditForm select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
  }

  form#userEditForm .submit-btn {
    background: #527294;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s ease;
  }

  form#userEditForm .submit-btn:hover {
    background: #405a74;
  }
  form#userEditForm {
    max-width: 500px;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  form#userEditForm label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
  }

  form#userEditForm input,
  form#userEditForm select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
  }

  form#userEditForm .submit-btn {
    background: #527294;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s ease;
  }

  form#userEditForm .submit-btn:hover {
    background: #405a74;
  }

  body{
    display: flex;
    justify-content: center;
    align-content:space-between;
  }
  iframe{
    width: 500px;
    margin-left:20px;
    border-color: black;
    padding: 10px;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<body>
  <form id="userEditForm" method="post" action="{{route('admin.saveagreement')}}">
    @csrf

    <label for="name">Name of a Tenant</label>
    <input type="text" id="name" name="name" required>

    <label for="flatno">Flat No.</label>
    <input type="text" id="flatno" name="flatno" required>

    <label for="locality">Locality</label>
    <input type="text" id="locality" name="locality" required>

    <label for="city">City</label>
    <input type="text" id="city" name="city" required>

    <label for="district">District</label>
    <input type="text" id="district" name="district" required>

      <label for="state">State</label>
      <input type="text" id="state" name="state" required>

      <input type="submit" class="submit-btn" value="Submit">
    </form>
  <div>

  <iframe src="{{url('agreementpreview')}}" frameborder="0" id="pdfpreviewer" height="500px" width="100%"></iframe>

  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const iframeElement = document.getElementById('pdfpreviewer');

    iframeElement.onload = function () {
      const iframe = iframeElement.contentDocument || iframeElement.contentWindow.document;

      const tenent_name_preview = iframe.getElementById('tenent_name_preview');
      const flat_no_preview = iframe.getElementById('flat_no_preview');
      const locality_preview = iframe.getElementById('locality_preview');
      const city_preview = iframe.getElementById('city_preview');
      const district_preview = iframe.getElementById('district_preview');
      const state_preview = iframe.getElementById('state_preview');

      const tenent_name = document.getElementById('name');
      const flat_no = document.getElementById('flatno');
      const locality = document.getElementById('locality');
      const city = document.getElementById('city');
      const district = document.getElementById('district');
      const state = document.getElementById('state');

      function updatePreview() {
        tenent_name_preview.innerText = tenent_name.value;
        flat_no_preview.innerText = flat_no.value;
        locality_preview.innerText = locality.value;
        city_preview.innerText = city.value;
        district_preview.innerText = district.value;
        state_preview.innerText = state.value;
      }

      [tenent_name, flat_no, locality, city, district, state].forEach(input => {
        input.addEventListener('input', updatePreview);
      });

      updatePreview(); // Initial call
    };
  });
</script>


</body>
