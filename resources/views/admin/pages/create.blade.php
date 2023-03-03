<html>

<head>
  {{-- Map --}}
  <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps.css" />
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps-web.min.js"></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  {{-- Search --}}
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox-web.js"></script>
  <link rel="stylesheet" type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox.css" />


  <link rel="stylesheet" type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
  </script>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
  </script>

  {{-- BOot --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  {{-- Font Awsome --}}
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css'
    integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w=='
    crossorigin='anonymous' />
</head>

<body class="m-0 p-0">

  {{-- NAV BAR --}}
  <div class="container-fluid container-nav p-0 d-flex justify-content-center align-items-center create-nav z-index-nav">

    <div class="row navbar-80 d-flex justify-content-center align-items-center">
      <div class="d-flex justify-content-between justify-content-center align-items-center">
        {{-- LOGO --}}
        <div class="logo-cont">
          <a href="/">
            <img src="{{ asset('assets/Logo.svg') }}" alt="logo">
          </a>
        </div>

        {{-- MENU --}}
        <div class="m-auto">
          <form class="d-flex mb-0 text-center" role="search">
            <input class="form-control me-2 rounded-5 search-border-pink" type="search" placeholder="Search"
              aria-label="Search">
            <button class="btn btn-login-register rounded-circle" type="submit"><i
                class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>

        {{-- DROP DOWN --}}
        <div class="dropdown">
          <button class="btn btn-light rounded-4 dropdown-toggle d-flex align-items-center" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
            <div class="ms-2 p-2">
              <i class="fa-solid fa-user"></i>
            </div>

          </button>
          <ul class="dropdown-menu rounded-4">
            <li><a class="dropdown-item" href="/admin/apartments"><i class="fa-solid mr-1 fa-house"></i>
                Apartments</a>
            </li>
            <li><a class="dropdown-item" href="{{ route('admin.dashboard.index') }}"><i
                  class="fa-solid mr-1 fa-table-columns"></i>
                Dashoard</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.apartments.create') }}"><i
                  class="fa-solid mr-1 fa-plus"></i> Add</a></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid mr-1 fa-right-from-bracket"></i>
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>

          </ul>
        </div>
      </div>

    </div>
  </div>


  {{-- Main  nav bar --}}
    <div class="d-flex align-items-center sidebar-height">
      <div class="sidebar-container rounded-4 ml-2 py-4 px-2">
        <div class="nav nav-flush text-center">
          <div class="nav-item d-flex flex-column align-items-center position-stiky">
            <div>
              {{-- <a href="/" class="nav-link active p-0" aria-current="page">
            <button type="button"
              class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn mb-3"
              data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right" data-mdb-content="Home"
              data-mdb-trigger="hover">
              <i class="fa-solid fa-house side-ico"></i>
            </button>
          </a> --}}
              <a href="/admin/apartments" class="nav-link active p-0">
                <button type="button"
                  class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn mb-3"
                  data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                  data-mdb-content="My Apartment" data-mdb-trigger="hover">
                  <i class="fas side-ico fa-house-user"></i>
                </button>
              </a>
              <a href="{{ route('admin.apartments.create') }}" class="nav-link active p-0">
                <button type="button"
                  class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn mb-3"
                  data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                  data-mdb-content="Create Apartment" data-mdb-trigger="hover">
                  <i class="fas fa-plus side-ico"></i>
                </button>
              </a>
              <a href="{{ route('admin.dashboard.index') }}" class="nav-link active p-0">
                <button type="button"
                  class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn mb-3"
                  data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                  data-mdb-content="Dashboard" data-mdb-trigger="hover">
                  <i class="fa-solid side-ico fa-table-columns"></i>
                </button>
              </a>
            </div>

            <div>
              <a class="nav-link active p-0 align-self-end" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button type="button"
                  class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                  data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                  data-mdb-content="Logout" data-mdb-trigger="hover">
                  <i class="fa-solid side-ico fa-right-from-bracket"></i>
                </button>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sidebar-height-mobile w-100 py-3 px-3">

      <div class="sidebar-container-mobile rounded-4 py-3 px-3">

        <div class="nav nav-flush text-center">

          <div class="nav-item w-100">

            <div class="d-flex justify-content-between align-items-center w-100">
              <a href="/admin/apartments" class="nav-link active p-0">
                <button type="button"
                  class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                  data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                  data-mdb-content="My Apartment" data-mdb-trigger="hover">
                  <i class="fas side-ico fa-house-user"></i>
                </button>
              </a>
              <a href="{{ route('admin.apartments.create') }}" class="nav-link active p-0">
                <button type="button"
                  class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                  data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                  data-mdb-content="Create Apartment" data-mdb-trigger="hover">
                  <i class="fas fa-plus side-ico"></i>
                </button>
              </a>
              <a href="{{ route('admin.dashboard.index') }}" class="nav-link active p-0">
                <button type="button"
                  class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                  data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                  data-mdb-content="Dashboard" data-mdb-trigger="hover">
                  <i class="fa-solid side-ico fa-table-columns"></i>
                </button>
              </a>
              <div>
                <a class="nav-link active p-0 align-self-end" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="Logout" data-mdb-trigger="hover">
                    <i class="fa-solid side-ico fa-right-from-bracket"></i>
                  </button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </div>


          </div>

        </div>

      </div>

    </div>


  {{-- MAPPA  --}}
  <div class="container-minus-nav container-sm align-items-center d-lg-flex mobile-fix">
    <div id="map" style="width:80%; height: 90%; border-radius: 2%"></div>
    <form class="d-lg-flex flex-lg-column justify-content-center mobile-fix  ps-lg-5 " method="POST"
      action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">

      @csrf


      <div class="fs-1 mb-5">New apartment</div>



      {{-- NAME --}}
      <div class="mb-4">
        <label class="form-label">Name</label>
        <input name="name" type="text" class="form-control " required>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- DESCRIPTION --}}
      <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" style="max-height: 91px" required></textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>


      {{-- primo raggruppamento  --}}
      <div class="d-lg-flex mb-4">

        {{-- ROOMS --}}
        <div class="mx-2 w-100">
          <label class="form-label form-check-label" for="">Rooms</label>
          <input type="number" min="1" max="50" class="form-control" name="rooms" required>
          @error('rooms')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        {{-- BEDS --}}
        <div class="mx-2 w-100">
          <label class="form-label form-check-label" for="">Beds</label>
          <input type="number" min="1" max="50" class="form-control" name="beds" required>
          @error('beds')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>


        {{-- BATHROOM --}}
        <div class="mx-2 w-100 ">
          <label class="form-label form-check-label" for="">Bathrooms</label>
          <input type="number" min="1" max="50" class="form-control" name="bathrooms" required>
          @error('bathrooms')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- MQ --}}
        <div class="mx-2 w-100 ">
          <label class="form-label form-check-label" for="">Mq</label>
          <input type="number" min="1" max="1000" class="form-control" name="mq" required>
          @error('mq')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>



      {{-- secondo raggruppamento --}}

      <div class="d-lg-flex justify-content-center align-items-end mb-4 ">

        {{-- IMMAGINE --}}

        <div class="file-input mx-2 w-100 d-flex flex-column ">
          <label for="">Image</label>
          <input type="file" name="cover_image" id="file-input" class="file-input__input " required />
          <label class="file-input__label mb-0 py-2 px-4 d-flex justify-content-center" for="file-input">
            <i class="fa-solid fa-file-arrow-up fs-4"></i>
          </label>
          @error('cover_image')
            <div class=" alert alert-danger">{{ $message }}</div>
          @enderror
        </div>


        <div class="w-100 mx-2 ">
          <label class="form-label form-check-label" for="">Accomodation</label>
          <input type="number" min="1" max="50" class="form-control" name="accomodation" required>
          @error('accomodation')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        
        
        {{-- PRICE --}}
        <div class="w-100 mx-2 ">
            <label class="form-label form-check-label" for="">Price</label>
            <input type="number" min="1" class="form-control" name="price" required>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        
        {{-- AVAILABLE --}}
        <div class="w-100 mx-2 ">
            <label class="form-label form-check-label" for="">Availability</label>
            <select name="available" class="form-control" required>
                <option value=1>Available</option>
                <option value=0>Not Available</option>
            </select>
        </div>
        
        {{-- ADDRESS --}}

        <div class="w-100 mx-2 ">
          {{-- <label class="form-label form-check-label" for="">Address</label> --}}
          <input type="text" class="form-control border-0 position-absolute"
            style="top: 120px; left: -1000px; opacity: 0.0;" name="address" id="address" required>
          @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

      </div>

      {{-- ACCOMODATION --}}

      <div class="d-flex flex-column justify-content-between ">

        {{-- SERVICES --}}
        <div class="fs-6 pt-1 ps-mobile">
          @foreach ($services as $service)
            <div class="cat action btn btn-dark border-0 rounded-5 p-0 mr-1 mb-2 ">
              <label class="">
                <input type="checkbox" name="services[]"
                  value="{{ $service->id }}"><span>{{ $service->name }}</span>
              </label>
            </div>
          @endforeach
        </div>

        {{-- INPUT LAT LONG HIDDEN --}}
        <input type="hidden" name="lat" type="text" id="lat"> </input>
        <input type="hidden" name="long" type="text" id="long"> </input>

        {{-- INVIO --}}
        <div class="w-25 mt-4 mobile-fix-create ">
          <button type="submit" class=" btn-custom rouded-2">ADD <i class="fa-solid ms-2 fa-plus"></i></button>
        </div>


      </div>




    </form>

  </div>



  {{-- FINE MAPPA  --}}


  <script>
    var ITALIA = [12.49427, 41.89056]
    var map = tt.map({
      key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
      container: "map",
      center: ITALIA,
      zoom: 6,
      language: "it-IT",
    })



    var options = {
      searchOptions: {
        key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
        language: "it-IT",
        limit: 5,
      },
      autocompleteOptions: {
        key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
        language: "it-IT",
      },
    }
    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
    var search = document.getElementById(map)
    document.body.append(searchBoxHTML)

    // ATACCARE SEARCH A MAP
    var searchMarkersManager = new SearchMarkersManager(map)
    ttSearchBox.on("tomtom.searchbox.resultsfound", handleResultsFound)
    ttSearchBox.on("tomtom.searchbox.resultselected", handleResultSelection)
    ttSearchBox.on("tomtom.searchbox.resultfocused", handleResultSelection)
    ttSearchBox.on("tomtom.searchbox.resultscleared", handleResultClearing)
    map.addControl(ttSearchBox, "top-left")




    // EVENT HENDLER
    function handleResultsFound(event) {
      var results = event.data.results.fuzzySearch.results

      if (results.length === 0) {
        searchMarkersManager.clear()
      }
      searchMarkersManager.draw(results)
      fitToViewport(results)

      // Lat


      var lat
      var address
      results.forEach(element => {
        lat = element.position.lat
        address = element.address.freeformAddress
        console.log(address)
        console.log(element)

        var addr = document.getElementById('address');
        addr.value = address
      });


      console.log(address)
      var latitudine = document.getElementById('lat');
      latitudine.value = lat;

      // Long
      var long
      results.forEach(element => {
        long = element.position.lng
      });

      console.log(long)
      var longitudine = document.getElementById('long');
      longitudine.value = long;
    }

    function handleResultSelection(event) {
      var result = event.data.result
      if (result.type === "category" || result.type === "brand") {
        return
      }
      searchMarkersManager.draw([result])
      fitToViewport(result)
    }

    function fitToViewport(markerData) {
      if (!markerData || (markerData instanceof Array && !markerData.length)) {
        return
      }
      var bounds = new tt.LngLatBounds()
      if (markerData instanceof Array) {
        markerData.forEach(function(marker) {
          bounds.extend(getBounds(marker))
        })
      } else {
        bounds.extend(getBounds(markerData))
      }
      map.fitBounds(bounds, {

        linear: true
      })
    }

    function getBounds(data) {
      var btmRight
      var topLeft
      if (data.viewport) {
        btmRight = [
          data.viewport.btmRightPoint.lng,
          data.viewport.btmRightPoint.lat,
        ]
        topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat]
      }
      return [btmRight, topLeft]
    }

    function handleResultClearing() {
      searchMarkersManager.clear()
    }


    // Manipulation
    function SearchMarkersManager(map, options) {
      this.map = map
      this._options = options || {}
      this._poiList = undefined
      this.markers = {}
    }

    SearchMarkersManager.prototype.draw = function(poiList) {
      this._poiList = poiList
      this.clear()
      this._poiList.forEach(function(poi) {
        var markerId = poi.id
        var poiOpts = {
          name: poi.poi ? poi.poi.name : undefined,
          address: poi.address ? poi.address.freeformAddress : "",
          distance: poi.dist,
          classification: poi.poi ? poi.poi.classifications[0].code : undefined,
          position: poi.position,
          entryPoints: poi.entryPoints,
        }
        var marker = new SearchMarker(poiOpts, this._options)
        marker.addTo(this.map)
        this.markers[markerId] = marker
      }, this)
    }

    SearchMarkersManager.prototype.clear = function() {
      for (var markerId in this.markers) {
        var marker = this.markers[markerId]
        marker.remove()
      }
      this.markers = {}
      this._lastClickedMarker = null
    }




    // -------------
    function SearchMarker(poiData, options) {
      this.poiData = poiData
      this.options = options || {}
      this.marker = new tt.Marker({
        element: this.createMarker(),
        anchor: "bottom",
      })
      var lon = this.poiData.position.lng || this.poiData.position.lon
      this.marker.setLngLat([lon, this.poiData.position.lat])
    }

    SearchMarker.prototype.addTo = function(map) {
      this.marker.addTo(map)
      this._map = map
      return this
    }

    SearchMarker.prototype.createMarker = function() {
      var elem = document.createElement("div")
      elem.className = "tt-icon-marker-black tt-search-marker"
      if (this.options.markerClassName) {
        elem.className += " " + this.options.markerClassName
      }
      var innerElem = document.createElement("div")
      innerElem.setAttribute(
        "style",
        "background: white; width: 10px; height: 15px; border-radius: 50%; border: 3px solid black;"
      )

      elem.appendChild(innerElem)
      return elem
    }

    SearchMarker.prototype.remove = function() {
      this.marker.remove()
      this._map = null
    }
  </script>
</body>

</html>
