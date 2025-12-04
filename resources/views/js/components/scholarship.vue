<template>
  <div class="scholarship-component">
    <h3 class="mb-3">County Bursary Application</h3>

    <div v-if="years.length > 0">
      <div class="form-group">
        <label for="yearSelect">
          Select Application Year <span class="text-danger">*</span>
        </label>
        <select
          id="yearSelect"
          class="form-control"
          v-model="selectedYear"
          required
        >
          <option value="">-- Select Application Year --</option>
          <option
            v-for="year in years"
            :key="year.id"
            :value="year.year"   <!-- use year.year if that’s what your API returns -->
          >
            {{ year.year }}
          </option>
        </select>
      </div>
    </div>

    <p v-else class="text-danger mt-3">
      There is currently no open application. Please check again later.
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      years: [],
      selectedYear: ''
    };
  },
  mounted() {
    axios.get('/api/application-years')
      .then(response => {
        this.years = response.data; // expects [{id: 1, year: 2025}, ...]
      })
      .catch(error => {
        console.error('Error fetching application years:', error);
      });
  }
}
</script>

<style scoped>
.scholarship-component {
  max-width: 600px;
  margin: auto;
}
</style>
