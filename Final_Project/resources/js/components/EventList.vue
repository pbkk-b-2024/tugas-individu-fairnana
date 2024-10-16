<template>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Coming Soon Events</h1>

        <div class="input-group mb-3">
            <input
                v-model="searchTerm"
                type="text"
                class="form-control"
                placeholder="Search events..."
            />
            <button class="btn btn-primary" @click="searchEvents">
                Search
            </button>
        </div>

        <div id="carouselEvents" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div
                    class="carousel-item"
                    v-for="(chunk, chunkIndex) in chunkedEvents"
                    :key="chunkIndex"
                    :class="{ active: chunkIndex === 0 }"
                >
                    <div class="d-flex justify-content-center flex-wrap">
                        <div
                            v-for="event in chunk"
                            :key="event.id"
                            class="card"
                            style="width: 18rem; margin: 10px"
                        >
                            <img
                                :src="event.images[0]?.url"
                                class="card-img-top"
                                alt="Event Image"
                            />
                            <div class="card-body">
                                <h5 class="card-title">{{ event.name }}</h5>
                                <p class="card-text">
                                    {{ event.description }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Event Date:
                                        {{
                                            formatDate(
                                                event.dates.start.dateTime
                                            )
                                        }}
                                    </small>
                                </p>
                                <button
                                    class="btn btn-danger btn-sm"
                                    @click="deleteEvent(event.id)"
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a
                class="carousel-control-prev"
                href="#carouselEvents"
                role="button"
                data-slide="prev"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
                <span class="sr-only">Previous</span>
            </a>
            <a
                class="carousel-control-next"
                href="#carouselEvents"
                role="button"
                data-slide="next"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="pagination mt-4 d-flex justify-content-center">
            <button
                class="btn btn-secondary"
                @click="prevPage"
                :disabled="currentPage === 1"
            >
                Previous
            </button>
            <span class="mx-2">Page {{ currentPage }} of {{ totalPages }}</span>
            <button
                class="btn btn-secondary"
                @click="nextPage"
                :disabled="currentPage === totalPages"
            >
                Next
            </button>
        </div>

        <div v-if="filteredEvents.length === 0" class="text-center mt-4">
            No events found
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            events: [], // Untuk menyimpan data acara dari API
            searchTerm: "", // Untuk pencarian
            currentPage: 1, // Halaman saat ini
            eventsPerPage: 12, // Jumlah acara per halaman
        };
    },
    computed: {
        filteredEvents() {
            // Mengatasi undefined events
            if (!this.events) return [];
            // Mengembalikan event yang sesuai dengan pencarian
            return this.events.filter((event) =>
                event.name.toLowerCase().includes(this.searchTerm.toLowerCase())
            );
        },
        totalPages() {
            return Math.ceil(this.filteredEvents.length / this.eventsPerPage);
        },
        chunkedEvents() {
            const chunks = [];
            for (
                let i = 0;
                i < this.filteredEvents.length;
                i += this.eventsPerPage
            ) {
                chunks.push(
                    this.filteredEvents.slice(i, i + this.eventsPerPage)
                );
            }
            return chunks;
        },
    },
    methods: {
        async fetchEvents() {
            try {
                const response = await axios.get(
                    "https://app.ticketmaster.com/discovery/v2/events.json",
                    {
                        params: {
                            apikey: "E7PM7oRcpclwKHyBvA7ytnRo6nmyLvec",
                        },
                    }
                );
                this.events = response.data._embedded.events; // Menyimpan data ke dalam state
            } catch (error) {
                console.error("Error fetching events:", error);
            }
        },
        formatDate(dateString) {
            const options = { year: "numeric", month: "long", day: "numeric" };
            return new Date(dateString).toLocaleDateString("id-ID", options); // Format tanggal sesuai lokal
        },
        deleteEvent(eventId) {
            if (confirm("Are you sure you want to delete this event?")) {
                this.$inertia.delete(`/admin/events/${eventId}`, {
                    onSuccess: () => alert("Event deleted successfully"),
                    onError: () => alert("Failed to delete event"),
                });
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
    },
    mounted() {
        this.fetchEvents(); // Ambil data saat komponen dimuat
    },
};
</script>

<style scoped>
.carousel-item {
    text-align: center;
}
.card {
    margin: 0 auto;
}
.pagination {
    margin: 20px 0;
}
</style>
