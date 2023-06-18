jQuery.fn.extend({
  live: function (event, callback) {
    if (this.selector) {
      jQuery(document).on(event, this.selector, callback);
    }
  }
});
jQuery(document).ready(function () {

  //LEAFLET INIT
  var mymap;
  var latitude = -2;
  var longitude = 117;
  var zoomLevel = 5;
  var objMap = '';
  var tmpLatProv = 0;
  var tmpLngProv = 0;
  var tmpProv = '';
  var tmpLatKab = 0;
  var tmpLngKab = 0;
  var tmpKab = '';

  initMap = function () {
    var container = L.DomUtil.get('map');
    if (container != null) {
      container._leaflet_id = null;
    }
  }
  resetColorInfoWindow = function () {
    jQuery('.infowindow .col-left').removeClass('bg-info-green');
    jQuery('.infowindow .col-left').removeClass('bg-info-blue');
    jQuery('.infowindow .col-left').removeClass('bg-info-yellow');
    jQuery('.infowindow .col-left').removeClass('bg-info-brown');
    jQuery('.infowindow .col-left').removeClass('bg-info-grey');
  }
  showMap = function () {
    initMap();
    if (latitude && longitude && zoomLevel) {
      var centerMap = [latitude, longitude];
      mymap = L.map('map').setView(centerMap, zoomLevel);
      setTimeout(function () {
        mymap.dragging.enable();
      });
      // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWRlb2ZpayIsImEiOiJja2F4eGVtY2IwY21xMnZvYWJ5azE0eWRnIn0.buGOeenzITnPaWe1pnQTWw', {
      //   maxZoom: 25,
      //   minZoom: 4,
      //   attribution: 'Map data <a href="https://www.google.co.id/maps">Google Map</a>',
      //   id: 'mapbox/streets-v11',
      //   tileSize: 512,
      //   zoomOffset: -1,
      // }).addTo(mymap);
      L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 18,
        minZoom: 4,
      }).addTo(mymap);

      var blueIcon = L.icon({
        iconUrl: 'https://simba.menlhk.go.id/portal/assets/images/maps.png',
        iconSize: [30, 30],
      });
      if (objMap) {
        var data = JSON.parse(JSON.stringify(objMap));
        jQuery.each(data, function (key, val) {
          // console.log(val);
          var content = '';
          var title = '';
          var lat = 0;
          var lng = 0;
          if (val.showCategories < 4) {
            lat = val.latitude;
            lng = val.longitude;
            var iconColor = L.divIcon({
              iconSize: null,
              html: '<div class="map-div-icon map-div-icon-' + val.color + '"><div class="map-div-icon-content">' + val.total + '</div></div>'
            });

            resetColorInfoWindow();
            jQuery('.infowindow .col-left').addClass('bg-info-' + val.color);

            if (val.showCategories == 1) {
              title = val.nama + ' (' + val.total + ' Bank Sampah)';
              jQuery('.nama-kabkota').hide();
              jQuery('#table-content-wilayah .infowindow .col-right-val-2').html(val.nama);
              var htmlval3 = '<button class="badge badge-info border-0 p-2 cursor-pointer my-1 lihat-banksampah" data-kabkota="0" data-prov="' + val.provinsi_uid + '">' + val.total_bsi + ' Bank Sampah Induk</button>';
              htmlval3 += '<button class="badge badge-primary border-0 p-2 cursor-pointer my-1 lihat-nasabah" data-kabkota="0" data-prov="' + val.provinsi_uid + '">' + val.total_nasabah + ' Bank Sampah Unit</button>';
              htmlval3 += '<br><button class="badge badge-success border-0 p-2 cursor-pointer my-1 lihat-sebaran-kabkota" data-lat="' + lat + '" data-lng="' + lng + '" data-prov="' + val.provinsi_uid + '">TAMPILKAN TITIK SEBARAN</button>';
              jQuery('#table-content-wilayah .infowindow .col-right-val-3').html(htmlval3);

              content = jQuery('#table-content-wilayah').html();

            } else if (val.showCategories == 2) {
              title = val.nama + ' (' + val.total + ' Bank Sampah)';

              jQuery('.nama-kabkota').show();
              jQuery('#table-content-wilayah .infowindow .col-right-val-1').html(val.nama);
              var htmlval3 = '<button class="badge badge-info border-0 p-2 cursor-pointer my-1 lihat-banksampah" data-kabkota="' + val.kabkota_uid + '" data-prov="' + val.provinsi_uid + '">' + val.total_bsi + ' Bank Sampah Induk</button>';
              htmlval3 += '<button class="badge badge-primary border-0 p-2 cursor-pointer my-1 lihat-nasabah" data-kabkota="' + val.kabkota_uid + '" data-prov="' + val.provinsi_uid + '">' + val.total_nasabah + ' Bank Sampah Unit</button><br>';
              htmlval3 += '<button class="badge badge-success border-0 p-2 cursor-pointer my-1 lihat-sebaran-banksampah" data-lat="' + lat + '" data-lng="' + lng + '" data-kabkota="' + val.kabkota_uid + '">TAMPILKAN TITIK SEBARAN</button>';
              jQuery('#table-content-wilayah .infowindow .col-right-val-3').html(htmlval3);

              content = jQuery('#table-content-wilayah').html();

            }
            title = '<div class="map-title map-div-icon-' + val.color + '"><b>' + title + '</b></div>';
            if (lat && lng) {
              //alert(lat);
              var latLng = [lat, lng];
              if (val.showCategories == 1) {
                L.marker(latLng, {
                  icon: iconColor
                }).bindTooltip(title).bindPopup(content).addTo(mymap);
              } else if (val.showCategories == 2) {
                L.marker(latLng, {
                  icon: iconColor
                }).bindTooltip(title).bindPopup(content).addTo(mymap);
              }
            }
          } else {
            title = val.nama_bank_sampah + ' (' + val.kode_bank_sampah + ')';

            jQuery('#table-content-bsi .infowindow .col-right-val-1').html(val.nama_bank_sampah);
            jQuery('#table-content-bsi .infowindow .col-right-val-2').html(val.alamat);
            jQuery('#table-content-bsi .infowindow .col-right-val-3').html('<button class="badge badge-info border-0 p-2 cursor-pointer my-1 lihat-nasabah" data-bsi="' + val.bank_sampah_uid + '">LIHAT DAFTAR NASABAH</button>');

            content = jQuery('#table-content-bsi').html();

            lat = val.latitude;
            lng = val.longitude;
            var latLng = [lat, lng];
            if (lat && lng) {
              L.marker(latLng, {
                icon: blueIcon
              }).bindTooltip(title).bindPopup(content).addTo(mymap);
            }
          }
        });
      }

    }
  }

  resetVar = function () {
    latitude = -2;
    longitude = 117;
    zoomLevel = 5;
    objMap = '';
    tmpLatProv = 0;
    tmpLngProv = 0;
    tmpProv = '';
    tmpLatKab = 0;
    tmpLngKab = 0;
    tmpKab = ''
  }

  loadFirst = function (kategori, subkategori) {
    $.ajax({
      url: api + "sebaranProvinsi",
      headers: {
        'x-api-key': isKey
      },
      success: function (res) {
        var res = JSON.parse(res);
        if (res.statusCode == 200) {
          var data = res;
          if (data.total) {
            resetVar();
            objMap = data.data;
            showMap();

            $('#reset-map-kabkota').hide();
            $('#reset-map-banksampah').hide();
            $('#reset-map').hide();

            $('#tbl-banksampah').show();
            $('#tbl-cerobong').hide();
            jQuery('.loading-ajax').hide();
            //console.log(objMap);
          }
        } else {
          console.log(res);
        }
      }
    });
  }

  showBanksampahOnProv = function (prov, lat, lng) {
    jQuery('.loading-ajax').show();
    $.ajax({
      url: api + "sebaranKabkota/x/" + prov,
      headers: {
        'x-api-key': isKey
      },
      success: function (res) {
        var res = JSON.parse(res);
        if (res.statusCode == 200) {
          var data = res;
          tmpProv = prov;
          latitude = tmpLatProv = lat;
          longitude = tmpLngProv = lng;
          zoomLevel = 8;
          objMap = data.data;
          showMap();

          $('#reset-map-kabkota').show();
          $('#reset-map-banksampah').hide();
          $('#reset-map').hide();

          $('#tbl-banksampah').show();
        }
      }
    });
  }
  $(document).on('click', '.lihat-sebaran-kabkota', function (e) {
    var prov = jQuery(this).attr('data-prov');
    var latProv = jQuery(this).attr('data-lat');
    var lngProv = jQuery(this).attr('data-lng');
    if (prov && latProv && lngProv) {
      showBanksampahOnProv(prov, latProv, lngProv);
    }
  });

  showBanksampahOnKabKota1 = function (kabkota, lat, lng) {
    jQuery('.loading-ajax').show();
    $.ajax({
      url: api + "sebaranBsi/x/" + kabkota,
      headers: {
        'x-api-key': isKey
      },
      success: function (res) {
        var res = JSON.parse(res);
        if (res.statusCode == 200) {
          var data = res;
          tmpKab = kabkota;
          latitude = tmpLatKab = lat;
          longitude = tmpLngKab = lng;
          zoomLevel = 10;
          objMap = data.data;
          showMap();

          $('#reset-map-kabkota').hide();
          $('#reset-map-banksampah').hide();
          $('#reset-map').show();
          $('#tbl-banksampah').hide();
        }
      }
    });
  }

  $(document).on('click', '.lihat-sebaran-banksampah', function () {
    var kabkota = jQuery(this).attr('data-kabkota');
    var latKab = jQuery(this).attr('data-lat');
    var lngKab = jQuery(this).attr('data-lng');
    if (kabkota && latKab && lngKab) {
      showBanksampahOnKabKota1(kabkota, latKab, lngKab);
    }
  });

  jQuery('#reset-map-kabkota, #reset-map').click(function () {
    loadFirst('', '');
    jQuery('#kategori').val('');
    jQuery('#kategori').trigger('change');
  });

  jQuery('#reset-map-banksampah').click(function () {
    showBanksampahOnKabKota1(tmpKab, tmpLatKab, tmpLngProv);
  });

  $(document).on('click', '.lihat-banksampah', function () {
    var prov = jQuery(this).attr('data-prov');
    var kabkota = jQuery(this).attr('data-kabkota');
    $.ajax({
      url: baseUrl + "index/sebaranBsi/t/1/x/" + kabkota + "/y/" + prov,
      success: function (res) {
        var data = JSON.parse(res);
        jQuery("#push-content-xl").html(data.html);
        jQuery('#modal-form-xl').modal('show');
      }
    });
  });
  $(document).on('click', '.lihat-nasabah', function () {
    var bsi = jQuery(this).attr('data-bsi');
    var prov = jQuery(this).attr('data-prov');
    var kabkota = jQuery(this).attr('data-kabkota');
    $.ajax({
      url: baseUrl + "/index/daftarNasabah/x/" + bsi + "/p/" + prov + "/k/" + kabkota,
      success: function (res) {
        var data = JSON.parse(res);
        jQuery("#push-content-xl").html(data.html);
        jQuery('#modal-form-xl').modal('show');
      }
    });
  });

  loadFirst('', '');
});
//
