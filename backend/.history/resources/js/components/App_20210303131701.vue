<template>
    <div>
        <nav>
            <ul>
                <li>
                    <router-link to="/home">Homepage</router-link>
                </li>

                <li>
                    <router-link to="/dashboard">Dashboard</router-link>
                </li>
            </ul>
        </nav>

        <main>
            <router-view></router-view>
        </main>
    </div>
</template>
