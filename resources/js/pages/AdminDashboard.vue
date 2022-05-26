<script>
import Users from "../components/Users";

export default {
    data() {
        return {};
    },
    components: {
        Users,
    },
    beforeRouteEnter(to, from, next) {
        if (!localStorage.getItem("userData")) {
            return next("/");
        }
        next();
    },
};
</script>

<template>
    <div class="max-w-7xl mx-auto">
        <div class="inline-block min-w-full py-2 align-middle">
            <div
                class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg"
            >
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                            >
                                #
                            </th>
                            <th
                                scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900"
                            >
                                User
                            </th>
                            <th
                                scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                            >
                                Email
                            </th>
                            <th
                                scope="col"
                                class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <Suspense>
                        <template #default>
                            <Users />
                        </template>
                        <template #fallback>
                            <h1 class="bg-blue-300">Loading ... </h1>
                        </template>
                    </Suspense>
                </table>
            </div>
        </div>
    </div>
</template>
