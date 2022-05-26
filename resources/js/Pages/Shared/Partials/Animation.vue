<template>
    <div>
        <svg
            width="120"
            height="100"
            viewBox="0 0 120 100"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <g id="Frame 1" clip-path="url(#clip0_0_1)">
                <rect width="120" height="100" />
                <g id="grayGroup">
                    <path
                        id="gray"
                        opacity="0.7"
                        d="M44.4644 47.8222C45.7125 48.6003 45.7221 50.414 44.4823 51.2053L9.8471 73.3098C8.51977 74.1569 6.77948 73.2091 6.77117 71.6345L6.5398 27.7922C6.53149 26.2176 8.26168 25.2514 9.59788 26.0844L44.4644 47.8222Z"
                    />
                </g>
                <g id="blueGroup">
                    <path
                        id="blue1"
                        opacity="0.7"
                        d="M59.4645 47.8222C60.7125 48.6003 60.7221 50.414 59.4823 51.2053L24.8471 73.3098C23.5198 74.1569 21.7795 73.2091 21.7712 71.6345L21.5398 27.7922C21.5315 26.2176 23.2617 25.2514 24.5979 26.0844L59.4645 47.8222Z"
                    />
                    <path
                        id="blue2"
                        opacity="0.7"
                        d="M44.4644 47.8222C45.7125 48.6003 45.7221 50.414 44.4823 51.2053L9.8471 73.3098C8.51977 74.1569 6.77948 73.2091 6.77117 71.6345L6.5398 27.7922C6.53149 26.2176 8.26168 25.2514 9.59788 26.0844L44.4644 47.8222Z"
                    />
                </g>
            </g>
            <defs>
                <clipPath id="clip0_0_1">
                    <rect width="120" height="100" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
</template>
<script>
export default {};
</script>
<style>
#blueGroup {
    fill: #4f46e5;
}

#grayGroup {
    fill: #64748b;
}
#blue1,
#blue2,
#gray {
    transition: all 1s ease;
}

#blue2 {
    transform: translateX(-100%);
}

svg:hover #blue1 {
    transform: translateX(20%);
}

svg:hover #gray {
    transform: translateX(40%);
    opacity: 0;
}

svg:hover #blue2 {
    transform: translateX(0%);
}
</style>
