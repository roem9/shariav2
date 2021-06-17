import * as React from "react";

function IconChevronsDownRight({
  size = 24,
  color = "currentColor",
  stroke = 2,
  ...props
}) {
  return <svg className="icon icon-tabler icon-tabler-chevrons-down-right" width={size} height={size} viewBox="0 0 24 24" strokeWidth={stroke} stroke={color} fill="none" strokeLinecap="round" strokeLinejoin="round" {...props}><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M13 5v8h-8" /><path d="M17 9v8h-8" /></svg>;
}

export default IconChevronsDownRight;