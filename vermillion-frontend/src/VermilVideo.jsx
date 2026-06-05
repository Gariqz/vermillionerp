import { AbsoluteFill, useCurrentFrame, interpolate } from "remotion";
import logo from "./assets/vermil-logo.png";

export const VermilVideo = () => {
  const frame = useCurrentFrame();

  // Fade in
  const opacity = interpolate(frame, [0, 20], [0, 1]);

  // Scale in
  const scale = interpolate(frame, [0, 20], [0.8, 1]);

  // Jitter effect (glitch feel)
  const jitterX = Math.sin(frame * 0.8) * 3;

  return (
    <AbsoluteFill className="bg-black flex items-center justify-center flex-col text-white">
      
      {/* LOGO */}
      <img
        src={logo}
        style={{
          width: 200,
          opacity,
          transform: `scale(${scale}) translateX(${jitterX}px)`
        }}
      />

      {/* TEXT */}
      {frame > 30 && (
        <h1 className="text-4xl mt-6 font-bold">
          VERMIL SYSTEM
        </h1>
      )}

      {/* ROLES */}
      {frame > 60 && (
        <p className="mt-4 text-xl tracking-widest">
          HOST • FINANCE • HR • TECH
        </p>
      )}

      {/* TAGLINE */}
      {frame > 100 && (
        <p className="mt-6 text-gray-400">
          All-in-one Management Platform
        </p>
      )}

    </AbsoluteFill>
  );
};