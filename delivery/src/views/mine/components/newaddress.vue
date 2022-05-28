<template>
  <div class="container">
    <van-nav-bar class="nav-bar" left-arrow @click-left="$router.back()">
    </van-nav-bar>
    <van-form @submit="onSubmit">
      <van-cell-group inset>
        <van-field
          v-model="nickname"
          name="nickname"
          label="昵称"
          placeholder="昵称"
          readonly
        />
        <van-field v-model="tel" name="tel" label="电话" placeholder="电话" />
        <van-field
          v-model="localization"
          name="localization"
          label="详细地址"
          placeholder="详细地址"
        />
        <van-field name="switch" label="默认">
          <template #input>
            <van-switch v-model="checked" size="20" />
          </template>
        </van-field>
      </van-cell-group>
      <div style="margin: 16px">
        <van-button round block type="primary" native-type="submit">
          提交
        </van-button>
      </div>
    </van-form>
  </div>
</template>

<script>
import globalConfig from '../../../globalConfig.vue';
import AMap from "AMap";
export default {
  data() {
    return {
        // localization:'',
        latitude:0,
        longitude:0,
        nickname:'',
        tel:'',
        localization:'',
        checked: 0,
    }
  },
  methods: {
    onSubmit(values) {
        // console.log(this.nickname);
        // console.log(sessionStorage.getItem('nickname'))

        console.log(values);
        console.log(this.latitude);
        console.log(this.longitude);


        this.$axios({
            methods:"post",
            url:globalConfig.base_url+`/deliveryServer/newaddress.php?username=${sessionStorage.getItem('username')}&longitude=${this.longitude}&latitude=${this.latitude}&localization=${this.localization}&default=${this.checked}&tel=${this.tel}`,
        }).then((res) => {
            console.log(res);
             this.$router.back();
        }).catch((error) => {
            console.log(error);
        })
    },
    getLocation() {
      const self = this;
      var geolocation = new AMap.Geolocation({
        // 是否使用高精度定位，默认：true
        enableHighAccuracy: true,
        // 设置定位超时时间，默认：无穷大
        timeout: 10000,
      });
      geolocation.getCurrentPosition(function (status, data) {
        if (status == "complete") {
          // data是具体的定位信息
          console.log(data);
          // 打印位置信息
          // console.log(data.position);
          // 打印经纬度
          console.log(data.position.lng, data.position.lat);

/**
 * 
 * 
 */
        //   this.longitude = data.position.lng;
        //   this.latitude = data.position.lat;

/**
 * 
 * 
 */

          // 接着进行逆向地理编码，坐标 -> 地址
          var geocoder = new AMap.Geocoder({
            // city 指定进行编码查询的城市，支持传入城市名、adcode 和 citycode
            city: "全国",
          });
          var lnglat = [data.position.lng, data.position.lat];
          geocoder.getAddress(lnglat, function (status, result) {
            if (status === "complete" && result.regeocode) {
              console.log(result.regeocode);
              
              // 将地址信息对象赋值，将定位到的地址展示在表单中
              self.AddressInfo = {
                province: result.regeocode.addressComponent.province,
                city: result.regeocode.addressComponent.city,
                county: result.regeocode.addressComponent.district,
                addressDetail: result.regeocode.formattedAddress,
                areaCode: result.regeocode.addressComponent.adcode, // 必须要加上，否则不显示地区
              };
            } else {
              console.log(result);
            }
          });
        } else {
          // onError(result)
          // 定位出错
          console.log("定位失败错误：", data.message);
          // 调用IP定位
        self.getLngLatLocation();
        }
      });
    },
    // 通过IP获取当前位置
    getLngLatLocation() {

      const self = this;
      var citySearch = new AMap.CitySearch();
      citySearch.getLocalCity(function (status, result) {
        if (status === "complete" && result.info === "OK") {
          // 查询成功，result即为当前所在城市信息
          console.log("通过ip获取当前城市：", result);

/**
 * 
 * 
 */

        console.log(result.bounds.northEast.lng);
        console.log(result.bounds.northEast.lat);

        self.longitude = result.bounds.northEast.lng;
        self.latitude = result.bounds.northEast.lat;

/**
 * 
 * 
 */
          // 逆向地理编码
          var geocoder = new AMap.Geocoder({
            // city 指定进行编码查询的城市，支持传入城市名、adcode 和 citycode
            city: result.adcode,
          });
          var lnglat = result.rectangle.split(";")[0].split(",");
          geocoder.getAddress(lnglat, function (status, data) {
            if (status === "complete" && data.info === "OK") {
              // result为对应的地理位置详细信息

/**
 * 
 * 
 */
              console.log("data.regeocode")
              console.log(data.regeocode);
              console.log(data.regeocode.formattedAddress);
              self.localization = data.regeocode.formattedAddress;
              
             
/**
 * 
 * 
 */
                // 将地址信息对象赋值，将定位到的地址展示在表单中
              self.AddressInfo = {
                province: data.regeocode.addressComponent.province,
                city: data.regeocode.addressComponent.city,
                county: data.regeocode.addressComponent.district,
                addressDetail: data.regeocode.formattedAddress,
                areaCode: data.regeocode.addressComponent.adcode, // 必须要加上，否则不显示地区
              };
            } else {
              console.log(data);
            }
          });
        }
      });


    
    },
  },
  created() {
      this.nickname = sessionStorage.getItem('nickname');
      console.log(this.nickname);
      console.log(this.$router.name);
      this.getLocation();
    
   }
}
</script>

<style lang="sass" scoped>
</style>