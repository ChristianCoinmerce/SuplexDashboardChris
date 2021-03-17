<template>
    <div>
        <nav>
            <ul>
                <li>
                    <router-link to="/">Homepage</router-link>
                </li>

                <li>
                    <router-link to="/about">Dashboard</router-link>
                </li>
            </ul>
        </nav>

        <main>
            <router-view></router-view>
        </main>
    </div>
</template>
